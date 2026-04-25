<?php

namespace App\Forms;

use App\Enums\ItemType;
use App\Services\OrderItemResolver;
use Filament\Forms\Components\Placeholder;

class BundleItemPreview
{
    public static function unitCostField(): Placeholder
    {
        return Placeholder::make('bundle_item_unit_cost')
            ->label('Costo unitario')
            ->content(function (callable $get): string {
                $preview = self::resolvePreview($get);

                if ($preview === null) {
                    return '-';
                }

                return '$' . number_format((float) $preview['unit_price'], 2);
            });
    }

    public static function subtotalField(): Placeholder
    {
        return Placeholder::make('bundle_item_subtotal')
            ->label('Subtotal')
            ->content(function (callable $get): string {
                $preview = self::resolvePreview($get);
                $quantity = (int) ($get('quantity') ?? 0);

                if ($preview === null || $quantity <= 0) {
                    return '-';
                }

                return '$' . number_format(((float) $preview['unit_price']) * $quantity, 2);
            });
    }

    public static function stockField(): Placeholder
    {
        return Placeholder::make('bundle_item_stock_status')
            ->label('Estado de stock')
            ->content(function (callable $get): string {
                $preview = self::resolvePreview($get);

                if ($preview === null) {
                    return '-';
                }

                if ((bool) data_get($preview, 'meta.stock.in_stock', true)) {
                    return 'Hay stock disponible.';
                }

                $items = collect(data_get($preview, 'meta.consumables', []))
                    ->filter(fn (array $item): bool => ! (bool) ($item['in_stock'] ?? true))
                    ->map(function (array $item): string {
                        $name = $item['product_name'] ?? 'producto';
                        $required = $item['required_units'] ?? 0;
                        $available = $item['available_stock'] ?? 0;

                        return "{$name}: requiere {$required}, disponible {$available}.";
                    })
                    ->implode(' ');

                return trim("No hay stock suficiente. {$items}");
            });
    }

    protected static function resolvePreview(callable $get): ?array
    {
        $itemType = $get('item_type');
        $itemId = $get('item_id');
        $quantity = $get('quantity');

        if (blank($itemType) || blank($itemId) || blank($quantity)) {
            return null;
        }

        try {
            return app(OrderItemResolver::class)->resolve(
                itemType: ItemType::from($itemType),
                itemId: (int) $itemId,
                quantity: (int) $quantity,
                meta: [],
            );
        } catch (\Throwable) {
            return null;
        }
    }
}
