<?php

namespace App\Forms;

use App\Enums\ItemType;
use App\Services\OrderItemResolver;
use Filament\Forms\Components\Placeholder;

class OrderItemPreview
{
    public static function priceField(): Placeholder
    {
        return Placeholder::make('calculated_unit_price')
            ->label('Precio calculado')
            ->content(function (callable $get): string {
                $preview = self::resolvePreview($get);

                if ($preview === null) {
                    return '-';
                }

                return '$' . number_format((float) $preview['unit_price'], 2);
            });
    }

    public static function conditionField(): Placeholder
    {
        return Placeholder::make('applied_condition')
            ->label('Condicion aplicada')
            ->content(function (callable $get): string {
                $preview = self::resolvePreview($get);

                if ($preview === null) {
                    return '-';
                }

                return (string) data_get($preview, 'meta.pricing_rule.condition_label', 'Precio base');
            });
    }

    public static function stockField(): Placeholder
    {
        return Placeholder::make('stock_status')
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
        $variant = $get('meta.variant');

        if (blank($itemType) || blank($itemId) || blank($quantity)) {
            return null;
        }

        try {
            return app(OrderItemResolver::class)->resolve(
                itemType: ItemType::from($itemType),
                itemId: (int) $itemId,
                quantity: (int) $quantity,
                meta: array_filter([
                    'variant' => filled($variant) ? $variant : null,
                ]),
            );
        } catch (\Throwable) {
            return null;
        }
    }
}
