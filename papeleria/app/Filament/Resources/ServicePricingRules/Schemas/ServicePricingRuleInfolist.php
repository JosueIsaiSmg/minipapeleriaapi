<?php

namespace App\Filament\Resources\ServicePricingRules\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ServicePricingRuleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('service.name')
                    ->label('Servicio'),
                TextEntry::make('variant')
                    ->label('Variante')
                    ->placeholder('-'),
                TextEntry::make('min_quantity')
                    ->label('Cantidad minima')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('max_quantity')
                    ->label('Cantidad maxima')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('price')
                    ->label('Precio')
                    ->money('USD'),
                TextEntry::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
