<?php

namespace App\Services;

use App\Models\Bundle;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class OrderItemStockManager
{
    public function assertAvailable(array $meta): void
    {
        $bundleStock = Arr::get($meta, 'bundle_stock');

        if (is_array($bundleStock) && ! (bool) Arr::get($bundleStock, 'in_stock', true)) {
            $required = Arr::get($bundleStock, 'required_units', 0);
            $available = Arr::get($bundleStock, 'available_stock', 0);
            $name = Arr::get($bundleStock, 'bundle_name', 'bundle');

            throw ValidationException::withMessages([
                'item_id' => "No hay stock suficiente. {$name}: requiere {$required}, disponible {$available}.",
            ]);
        }

        $insufficient = collect(Arr::get($meta, 'consumables', []))
            ->filter(fn (array $consumable): bool => ! (bool) Arr::get($consumable, 'in_stock', true))
            ->values();

        if ($insufficient->isEmpty()) {
            return;
        }

        $message = $insufficient
            ->map(function (array $consumable): string {
                $required = Arr::get($consumable, 'required_units', 0);
                $available = Arr::get($consumable, 'available_stock', 0);
                $name = Arr::get($consumable, 'product_name', 'producto');
                $variantName = Arr::get($consumable, 'variant_name');

                if (filled($variantName) && (bool) Arr::get($consumable, 'uses_variant_stock', false)) {
                    $name .= " ({$variantName})";
                }

                return "{$name}: requiere {$required}, disponible {$available}.";
            })
            ->implode(' ');

        throw ValidationException::withMessages([
            'item_id' => "No hay stock suficiente. {$message}",
        ]);
    }

    public function consume(array $meta): void
    {
        $bundleStock = Arr::get($meta, 'bundle_stock');

        if (is_array($bundleStock) && filled(Arr::get($bundleStock, 'bundle_id'))) {
            $bundle = Bundle::query()->lockForUpdate()->find(Arr::get($bundleStock, 'bundle_id'));
            $requiredUnits = (int) ceil((float) Arr::get($bundleStock, 'required_units', 0));

            if ($bundle && $requiredUnits > 0) {
                if ($bundle->stock < $requiredUnits) {
                    throw ValidationException::withMessages([
                        'item_id' => "No hay stock suficiente para {$bundle->name}.",
                    ]);
                }

                $bundle->decrement('stock', $requiredUnits);
            }
        }

        foreach (Arr::get($meta, 'consumables', []) as $consumable) {
            $usesVariantStock = (bool) Arr::get($consumable, 'uses_variant_stock', false);

            if ($usesVariantStock && filled(Arr::get($consumable, 'variant_id'))) {
                $variant = Variant::query()->lockForUpdate()->find(Arr::get($consumable, 'variant_id'));
                $requiredUnits = (int) ceil((float) Arr::get($consumable, 'required_units', 0));

                if ($variant && $requiredUnits > 0) {
                    if (($variant->stock ?? 0) < $requiredUnits) {
                        throw ValidationException::withMessages([
                            'item_id' => "No hay stock suficiente para la variante {$variant->name}.",
                        ]);
                    }

                    $variant->decrement('stock', $requiredUnits);
                    continue;
                }
            }

            $product = Product::query()->lockForUpdate()->find($consumable['product_id']);

            if (! $product) {
                continue;
            }

            $requiredUnits = (int) ceil((float) Arr::get($consumable, 'required_units', 0));

            if ($requiredUnits <= 0) {
                continue;
            }

            if ($product->stock < $requiredUnits) {
                throw ValidationException::withMessages([
                    'item_id' => "No hay stock suficiente para {$product->name}.",
                ]);
            }

            $product->decrement('stock', $requiredUnits);
        }
    }

    public function restore(?array $meta): void
    {
        $bundleStock = Arr::get($meta ?? [], 'bundle_stock');

        if (is_array($bundleStock) && filled(Arr::get($bundleStock, 'bundle_id'))) {
            $bundle = Bundle::query()->lockForUpdate()->find(Arr::get($bundleStock, 'bundle_id'));
            $requiredUnits = (int) ceil((float) Arr::get($bundleStock, 'required_units', 0));

            if ($bundle && $requiredUnits > 0) {
                $bundle->increment('stock', $requiredUnits);
            }
        }

        foreach (Arr::get($meta ?? [], 'consumables', []) as $consumable) {
            $usesVariantStock = (bool) Arr::get($consumable, 'uses_variant_stock', false);

            if ($usesVariantStock && filled(Arr::get($consumable, 'variant_id'))) {
                $variant = Variant::query()->lockForUpdate()->find(Arr::get($consumable, 'variant_id'));
                $requiredUnits = (int) ceil((float) Arr::get($consumable, 'required_units', 0));

                if ($variant && $requiredUnits > 0) {
                    $variant->increment('stock', $requiredUnits);
                    continue;
                }
            }

            $product = Product::query()->lockForUpdate()->find($consumable['product_id']);

            if (! $product) {
                continue;
            }

            $requiredUnits = (int) ceil((float) Arr::get($consumable, 'required_units', 0));

            if ($requiredUnits <= 0) {
                continue;
            }

            $product->increment('stock', $requiredUnits);
        }
    }
}
