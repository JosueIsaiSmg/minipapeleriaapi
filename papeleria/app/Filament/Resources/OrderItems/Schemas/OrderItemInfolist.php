<?php

namespace App\Filament\Resources\OrderItems\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')->label('ID'),
                TextEntry::make('order_id')->label('Orden'),
                TextEntry::make('item_type')->label('Tipo')->formatStateUsing(fn($state) => $state->label()),
                TextEntry::make('item.name')->label('Concepto'),
                TextEntry::make('meta.variant')->label('Variante')->placeholder('-'),
                TextEntry::make('quantity')->label('Cantidad'),
                TextEntry::make('unit_price')->label('Precio unitario'),
                TextEntry::make('stock_label')->label('Inventario'),
                TextEntry::make('applied_condition_label')->label('Condicion aplicada')->placeholder('-'),
                TextEntry::make('meta.pricing_rule.tipo')->label('Tipo de regla')->placeholder('-'),
                TextEntry::make('meta.pricing_rule.price')->label('Precio resuelto')->placeholder('-'),
                TextEntry::make('created_at')->label('Creado'),
            ]);
    }
}
