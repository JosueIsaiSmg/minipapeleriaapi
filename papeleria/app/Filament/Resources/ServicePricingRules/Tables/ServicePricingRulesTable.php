<?php

namespace App\Filament\Resources\ServicePricingRules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicePricingRulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.name')
                    ->label('Servicio')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('variant')
                    ->label('Variante')
                    ->placeholder('-'),
                TextColumn::make('min_quantity')
                    ->label('Cantidad minima')
                    ->numeric()
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('max_quantity')
                    ->label('Cantidad maxima')
                    ->numeric()
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Precio')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Creado')
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
