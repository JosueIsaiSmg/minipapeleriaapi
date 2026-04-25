<?php

namespace App\Filament\Resources\Bundles\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

class BundleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('id')->label('ID'),
            TextEntry::make('name')->label('Nombre'),
            TextEntry::make('description')->label('Descripcion'),
            TextEntry::make('stock')->label('Stock'),
            TextEntry::make('price')->label('Precio total')->money('USD'),
            TextEntry::make('stock_status_label')
                ->label('Estado')
                ->badge()
                ->color(fn ($record): string => $record->stock_status_color),
            RepeatableEntry::make('items')
            ->label('Conceptos del bundle')
            ->schema([
                TextEntry::make('item.name')->label('Concepto'),
                TextEntry::make('quantity')->label('Cantidad'),
            ]),
        ]);
    }
}
