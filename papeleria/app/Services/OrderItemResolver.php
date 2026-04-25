<?php

namespace App\Services;

use App\Enums\ItemType;
use App\Models\Bundle;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceConsumable;
use App\Models\ServicePricingRule;
use App\Models\Variant;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class OrderItemResolver
{
    public function resolve(ItemType $itemType, int $itemId, int $quantity, array $meta = []): array
    {
        return $this->resolveInternal($itemType, $itemId, $quantity, $meta);
    }

    protected function resolveInternal(ItemType $itemType, int $itemId, int $quantity, array $meta = [], array $bundleStack = []): array
    {
        $cleanMeta = $this->normalizeMeta($meta);

        return match ($itemType) {
            ItemType::Product => $this->resolveProduct(
                product: Product::query()->findOrFail($itemId),
                quantity: $quantity,
                meta: $cleanMeta,
            ),
            ItemType::Service => $this->resolveService(
                service: Service::query()->with(['pricingRules', 'consumables.product', 'consumables.productVariant'])->findOrFail($itemId),
                quantity: $quantity,
                meta: $cleanMeta,
            ),
            ItemType::Bundle => $this->resolveBundle(
                bundle: Bundle::query()->with('items')->findOrFail($itemId),
                quantity: $quantity,
                bundleStack: $bundleStack,
            ),
        };
    }

    public function syncOrderTotal(Order $order): void
    {
        $total = $order->items()
            ->get()
            ->sum(fn (OrderItem $item): float => $item->quantity * $item->unit_price);

        $order->update(['total' => round($total, 2)]);
    }

    protected function resolveProduct(Product $product, int $quantity, array $meta): array
    {
        $variant = $this->resolveProductVariant($product, $meta);
        $usesVariantStock = $variant !== null && $variant->stock !== null;
        $requiredUnits = $quantity;
        $availableUnits = (float) ($usesVariantStock ? $variant->stock : $product->stock);
        $inStock = $availableUnits >= $requiredUnits;

        return [
            'unit_price' => (float) ($variant?->price ?? $product->price),
            'meta' => array_merge($meta, [
                'pricing_rule' => [
                    'tipo' => filled($variant?->name) ? 'variante' : 'base',
                    'variante' => $variant?->name,
                    'condition_label' => filled($variant?->name) ? 'Variante: ' . $variant->name : 'Precio base',
                    'price' => (float) ($variant?->price ?? $product->price),
                ],
                'consumables' => [[
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'variant_id' => $variant?->id,
                    'variant_name' => $variant?->name,
                    'uses_variant_stock' => $usesVariantStock,
                    'required_units' => $requiredUnits,
                    'available_stock' => $availableUnits,
                    'in_stock' => $inStock,
                ]],
                'stock' => [
                    'in_stock' => $inStock,
                    'required_units' => $requiredUnits,
                    'available_units' => $availableUnits,
                    'source' => $usesVariantStock ? 'variant' : 'product',
                    'shortage' => max(0, $requiredUnits - $availableUnits),
                ],
            ]),
        ];
    }

    protected function resolveProductVariant(Product $product, array $meta): ?Variant
    {
        $variant = $this->resolveVariant($meta);

        if (blank($variant)) {
            return null;
        }

        return $product->variants()
            ->get()
            ->first(fn (Variant $item): bool => $this->normalizeString($item->name) === $variant);
    }

    protected function resolveService(Service $service, int $quantity, array $meta): array
    {
        $pricingRule = $this->resolvePricingRule($service, $quantity, $meta);

        if (! $pricingRule) {
            throw ValidationException::withMessages([
                'item_id' => 'No pricing rule matched the selected service and criteria.',
            ]);
        }

        $consumables = $this->selectConsumables($service, $meta);

        $consumableSnapshot = $consumables->map(function (ServiceConsumable $consumable) use ($quantity): array {
            $requiredUnits = round($consumable->units_per_service * $quantity, 3);
            $usesVariantStock = $consumable->productVariant !== null && $consumable->productVariant->stock !== null;
            $availableUnits = (float) ($usesVariantStock
                ? $consumable->productVariant->stock
                : $consumable->product->stock);
            $inStock = $availableUnits >= $requiredUnits;

            return [
                'product_id' => $consumable->product_id,
                'product_name' => $consumable->product->name,
                'variant_id' => $consumable->product_variant_id,
                'variant_name' => $consumable->productVariant?->name,
                'uses_variant_stock' => $usesVariantStock,
                'variant' => $consumable->variant,
                'units_per_service' => (float) $consumable->units_per_service,
                'required_units' => $requiredUnits,
                'available_stock' => $availableUnits,
                'in_stock' => $inStock,
            ];
        })->all();

        $inStock = collect($consumableSnapshot)->every(fn (array $item): bool => (bool) $item['in_stock']);
        $shortage = collect($consumableSnapshot)
            ->sum(fn (array $item): float => max(0, $item['required_units'] - $item['available_stock']));

        return [
            'unit_price' => (float) $pricingRule->price,
            'meta' => array_merge($meta, [
                'pricing_rule' => [
                    'id' => $pricingRule->id,
                    'tipo' => filled($pricingRule->variant) ? 'variante' : 'cantidad',
                    'variante' => $pricingRule->variant,
                    'min_quantity' => $pricingRule->min_quantity,
                    'max_quantity' => $pricingRule->max_quantity,
                    'condition_label' => $this->buildPricingRuleConditionLabel($pricingRule),
                    'price' => (float) $pricingRule->price,
                ],
                'consumables' => $consumableSnapshot,
                'stock' => [
                    'in_stock' => $inStock,
                    'shortage' => round($shortage, 3),
                    'checked_products' => count($consumableSnapshot),
                ],
            ]),
        ];
    }

    protected function resolveBundle(Bundle $bundle, int $quantity, array $bundleStack = []): array
    {
        if (in_array($bundle->id, $bundleStack, true)) {
            throw ValidationException::withMessages([
                'item_id' => 'El bundle contiene una referencia circular.',
            ]);
        }

        $bundle->loadMissing('items.item');

        $consumables = [];
        $bundleBreakdown = [];
        $unitPrice = 0.0;

        foreach ($bundle->items as $bundleItem) {
            $resolved = $this->resolveInternal(
                itemType: $bundleItem->item_type,
                itemId: (int) $bundleItem->item_id,
                quantity: (int) $bundleItem->quantity,
                meta: [],
                bundleStack: [...$bundleStack, $bundle->id],
            );

            $lineUnitTotal = round(((float) $resolved['unit_price']) * (int) $bundleItem->quantity, 2);
            $unitPrice += $lineUnitTotal;
            $consumables = [...$consumables, ...data_get($resolved, 'meta.consumables', [])];
            $bundleBreakdown[] = [
                'item_type' => $bundleItem->item_type->value,
                'item_name' => $bundleItem->item?->name,
                'quantity' => (int) $bundleItem->quantity,
                'unit_price' => (float) $resolved['unit_price'],
                'line_total' => $lineUnitTotal,
                'condition_label' => data_get($resolved, 'meta.pricing_rule.condition_label'),
            ];
        }

        $scaledConsumables = collect($consumables)
            ->map(function (array $consumable) use ($quantity): array {
                $requiredUnits = round(((float) ($consumable['required_units'] ?? 0)) * $quantity, 3);
                $availableUnits = (float) ($consumable['available_stock'] ?? 0);

                $consumable['required_units'] = $requiredUnits;
                $consumable['in_stock'] = $availableUnits >= $requiredUnits;

                return $consumable;
            })
            ->values()
            ->all();

        $bundleAvailableUnits = (int) $bundle->stock;
        $bundleRequiredUnits = $quantity;
        $bundleInStock = $bundleAvailableUnits >= $bundleRequiredUnits;

        $inStock = $bundleInStock && collect($scaledConsumables)->every(fn (array $item): bool => (bool) $item['in_stock']);
        $shortage = collect($scaledConsumables)
            ->sum(fn (array $item): float => max(0, (float) $item['required_units'] - (float) $item['available_stock']));

        $effectiveBundlePrice = $bundle->price ?? round($unitPrice, 2);

        return [
            'unit_price' => (float) $effectiveBundlePrice,
            'meta' => [
                'pricing_rule' => [
                    'tipo' => 'bundle',
                    'condition_label' => 'Bundle: ' . $bundle->name,
                    'price' => (float) $effectiveBundlePrice,
                ],
                'bundle_stock' => [
                    'bundle_id' => $bundle->id,
                    'bundle_name' => $bundle->name,
                    'required_units' => $bundleRequiredUnits,
                    'available_stock' => $bundleAvailableUnits,
                    'in_stock' => $bundleInStock,
                ],
                'bundle_breakdown' => $bundleBreakdown,
                'bundle_cost_total' => round($unitPrice, 2),
                'consumables' => $scaledConsumables,
                'stock' => [
                    'in_stock' => $inStock,
                    'shortage' => round($shortage + max(0, $bundleRequiredUnits - $bundleAvailableUnits), 3),
                    'checked_products' => count($scaledConsumables) + 1,
                ],
            ],
        ];
    }

    protected function resolvePricingRule(Service $service, int $quantity, array $meta): ?ServicePricingRule
    {
        $variant = $this->resolveVariant($meta);

        $specificRule = $service->pricingRules
            ->filter(function (ServicePricingRule $rule) use ($quantity, $variant): bool {
                if (! $this->matchesQuantityWindow($rule, $quantity)) {
                    return false;
                }

                return $this->matchesSpecificValue($variant, [$rule->variant]);
            })
            ->sortByDesc(fn (ServicePricingRule $rule): int => (int) $rule->min_quantity)
            ->first();

        if ($specificRule) {
            return $specificRule;
        }

        return $service->pricingRules
            ->filter(fn (ServicePricingRule $rule): bool => blank($rule->variant) && $this->matchesQuantityWindow($rule, $quantity))
            ->sortByDesc(fn (ServicePricingRule $rule): int => (int) $rule->min_quantity)
            ->first();
    }

    protected function matchesQuantityWindow(ServicePricingRule $rule, int $quantity): bool
    {
        if ($rule->min_quantity !== null && $quantity < $rule->min_quantity) {
            return false;
        }

        if ($rule->max_quantity !== null && $quantity > $rule->max_quantity) {
            return false;
        }

        return true;
    }

    protected function matchesSpecificValue(?string $needle, array $haystack): bool
    {
        if (blank($needle)) {
            return false;
        }

        return collect($haystack)
            ->filter()
            ->contains(fn (string $value): bool => $this->normalizeString($value) === $needle);
    }

    protected function consumableApplies(ServiceConsumable $consumable, array $meta): bool
    {
        if (blank($consumable->variant)) {
            return true;
        }

        return $this->normalizeString($consumable->variant) === $this->resolveVariant($meta);
    }

    protected function selectConsumables(Service $service, array $meta)
    {
        $selector = $this->resolveVariant($meta);

        if (filled($selector)) {
            $specific = $service->consumables
                ->filter(fn (ServiceConsumable $consumable): bool => filled($consumable->variant))
                ->filter(fn (ServiceConsumable $consumable): bool => $this->consumableApplies($consumable, $meta))
                ->values();

            if ($specific->isNotEmpty()) {
                return $specific;
            }
        }

        return $service->consumables
            ->filter(fn (ServiceConsumable $consumable): bool => blank($consumable->variant))
            ->values();
    }

    protected function normalizeMeta(array $meta): array
    {
        return collect($meta)
            ->only(['variant'])
            ->map(fn ($value) => is_string($value) ? trim($value) : $value)
            ->filter(fn ($value) => filled($value))
            ->all();
    }

    protected function normalizeString(?string $value): ?string
    {
        return filled($value) ? mb_strtolower(trim($value)) : null;
    }

    protected function resolveVariant(array $meta): ?string
    {
        return $this->normalizeString(Arr::get($meta, 'variant'));
    }

    protected function buildPricingRuleConditionLabel(ServicePricingRule $pricingRule): string
    {
        $parts = [];

        if (filled($pricingRule->variant)) {
            $parts[] = 'Variante: ' . $pricingRule->variant;
        }

        if ($pricingRule->min_quantity !== null || $pricingRule->max_quantity !== null) {
            $min = $pricingRule->min_quantity ?? 1;
            $max = $pricingRule->max_quantity;
            $parts[] = $max !== null
                ? "Rango {$min} - {$max}"
                : "Rango {$min}+";
        }

        return $parts !== [] ? implode(' | ', $parts) : 'Precio base';
    }
}
