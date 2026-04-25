<?php

namespace App\Forms;

use App\Enums\ItemType;
use App\Models\Product;
use App\Models\Service;
use App\Models\Variant;
use Filament\Forms\Components\Select;

class VariantSelect
{
    public static function make(
        string $field = 'meta.variant',
        string $itemTypeField = 'item_type',
        string $itemIdField = 'item_id',
    ): Select {
        return Select::make($field)
            ->label('Variante')
            ->options(function (callable $get): array {
                $itemType = $get('item_type') ?? $get('..' . '.item_type');
                $itemId = $get('item_id') ?? $get('..' . '.item_id');

                if (blank($itemType) || blank($itemId)) {
                    return [];
                }

                $modelClass = match ($itemType) {
                    ItemType::Product->value => Product::class,
                    ItemType::Service->value => Service::class,
                    default => null,
                };

                if (! $modelClass) {
                    return [];
                }

                $morphType = (new $modelClass)->getMorphClass();

                return Variant::query()
                    ->where('variantable_type', $morphType)
                    ->where('variantable_id', $itemId)
                    ->orderBy('name')
                    ->pluck('name', 'name')
                    ->toArray();
            })
            ->searchable()
            ->preload()
            ->helperText('Opcional. Seleccionala si el producto o servicio tiene variantes.')
            ->live()
            ->reactive();
    }
}
