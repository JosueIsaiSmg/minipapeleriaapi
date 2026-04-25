<?php

namespace App\Filament\Resources\ServiceConsumables\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ServiceConsumableInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('service.name')
                    ->label('Servicio'),
                TextEntry::make('product.name')
                    ->label('Producto'),
                TextEntry::make('productVariant.name')
                    ->label('Variante del producto')
                    ->placeholder('-'),
                TextEntry::make('units_per_service')
                    ->label('Unidades por servicio')
                    ->numeric(decimalPlaces: 3),
                TextEntry::make('variant')
                    ->label('Variante')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
