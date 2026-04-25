<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function components(): array
    {
        return [
            TextInput::make('name')
                ->label('Nombre')
                ->required(),
            TextInput::make('phone')
                ->label('Telefono')
                ->tel(),
            TextInput::make('email')
                ->label('Correo')
                ->email(),
            TextInput::make('social_profile_url')
                ->label('Link de red social')
                ->url()
                ->placeholder('https://instagram.com/cliente'),
            TextInput::make('facebook_url')
                ->label('Link de Facebook')
                ->url()
                ->placeholder('https://facebook.com/cliente'),
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(static::components());
    }
}
