<?php

namespace App\Filament\Resources\ServiceConsumables\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceConsumablesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.name')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('product.name')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('productVariant.name')
                    ->label('Variante del producto')
                    ->placeholder('-'),
                TextColumn::make('units_per_service')
                    ->label('Unidades por servicio')
                    ->numeric(decimalPlaces: 3)
                    ->sortable(),
                TextColumn::make('variant')
                    ->label('Variante')
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
