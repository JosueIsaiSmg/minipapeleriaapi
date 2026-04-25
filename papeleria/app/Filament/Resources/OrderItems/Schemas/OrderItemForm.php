<?php

namespace App\Filament\Resources\OrderItems\Schemas;

use App\Forms\ItemSelect;
use App\Forms\ItemTypeSelect;
use App\Forms\OrderItemPreview;
use App\Forms\VariantSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->label('Orden')
                    ->required(),
                ItemTypeSelect::make(),
                ItemSelect::make(),
                TextInput::make('quantity')
                    ->label('Cantidad')
                    ->integer()
                    ->required()
                    ->live(),
                VariantSelect::make(),
                OrderItemPreview::priceField(),
                OrderItemPreview::conditionField(),
                OrderItemPreview::stockField(),
            ]);
    }
}
