<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')->label('Nombre'),
                TextEntry::make('phone')
                    ->label('Telefono')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Correo')
                    ->placeholder('-'),
                TextEntry::make('social_profile_url')
                    ->label('Link de red social')
                    ->placeholder('-'),
                TextEntry::make('facebook_url')
                    ->label('Link de Facebook')
                    ->placeholder('-'),
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
