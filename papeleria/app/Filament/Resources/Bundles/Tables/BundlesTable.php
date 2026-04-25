<?php

namespace App\Filament\Resources\Bundles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class BundlesTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('name')->label('Nombre')->sortable()->searchable(),
                TextColumn::make('description')->label('Descripcion')->limit(50),
                TextColumn::make('stock')->label('Stock')->numeric()->sortable(),
                TextColumn::make('price')
                    ->label('Precio')
                    ->money('USD'),
                TextColumn::make('stock_status_label')
                    ->label('Estado')
                    ->badge()
                    ->color(fn ($record): string => $record->stock_status_color),
                TextColumn::make('created_at')->label('Creado')->dateTime()->sortable(),
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
