<?php

namespace App\Filament\Resources\Bundles\Schemas;

use App\Enums\ItemType;
use App\Forms\ItemSelect;
use App\Forms\ItemTypeSelect;
use App\Models\Product;
use App\Models\Service;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class BundleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
                TextInput::make('name')->label('Nombre')->required()->maxLength(255),
                Textarea::make('description')->label('Descripcion')->rows(3),
                TextInput::make('stock')
                    ->label('Stock')
                    ->integer()
                    ->required()
                    ->minValue(0)
                    ->default(0),
                TextInput::make('price')
                    ->label('Precio total del bundle')
                    ->numeric()
                    ->minValue(0)
                    ->prefix('$')
                    ->helperText('Editable. Si lo dejas vacio, se usara el precio configurado en backend.'),
                Repeater::make('bundle_items')
                    ->label('Conceptos del bundle')
                    ->schema([
                        ItemTypeSelect::make(),
                        ItemSelect::make(),
                        TextInput::make('quantity')
                            ->label('Cantidad')
                            ->integer()
                            ->required()
                            ->minValue(1),
                    ])
                    ->defaultItems(0)
                    ->itemLabel(fn (array $state): ?string => self::resolveItemLabel($state))
                    ->reorderable(false)
                    ->collapsible()
                    ->columnSpanFull(),
            ]);
    }

    protected static function resolveItemLabel(array $state): ?string
    {
        $itemType = $state['item_type'] ?? null;
        $itemId = $state['item_id'] ?? null;

        if (blank($itemType) || blank($itemId)) {
            return 'Nuevo concepto';
        }

        $modelClass = match ($itemType) {
            ItemType::Product->value => Product::class,
            ItemType::Service->value => Service::class,
            ItemType::Bundle->value => Bundle::class,
            default => null,
        };

        if (! $modelClass) {
            return 'Nuevo concepto';
        }

        $name = $modelClass::query()->whereKey($itemId)->value('name') ?? 'Concepto';
        $quantity = $state['quantity'] ?? null;

        if (filled($quantity)) {
            $name .= " x{$quantity}";
        }

        return $name;
    }
}
