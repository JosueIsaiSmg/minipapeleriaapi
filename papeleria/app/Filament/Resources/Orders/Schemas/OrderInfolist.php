<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('customer.name')
                    ->label('Cliente'),
                TextEntry::make('status')
                    ->label('Estado')
                    ->formatStateUsing(fn ($state) => $state?->label() ?? '-'),
                TextEntry::make('total')
                    ->label('Total')
                    ->money('USD'),
                TextEntry::make('description')
                    ->label('Descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('all_photo_urls')
                    ->label('Fotos')
                    ->html()
                    ->formatStateUsing(function (array $state): string {
                        if ($state === []) {
                            return '-';
                        }

                        return collect($state)
                            ->map(fn (string $url): string => "<img src=\"{$url}\" alt=\"Order photo\" style=\"width:64px;height:64px;object-fit:cover;border-radius:8px;margin-right:8px;margin-bottom:8px;display:inline-block;\">")
                            ->implode('');
                    })
                    ->columnSpanFull(),
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
