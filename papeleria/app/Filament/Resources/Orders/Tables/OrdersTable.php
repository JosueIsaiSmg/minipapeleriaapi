<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Orden')
                    ->sortable(),
                TextColumn::make('preview_image_url')
                    ->label('Vista previa')
                    ->html()
                    ->formatStateUsing(fn (?string $state): string => $state
                        ? "<img src=\"{$state}\" alt=\"Preview\" style=\"width:48px;height:48px;object-fit:cover;border-radius:8px;\">"
                        : '-'),
                TextColumn::make('customer.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state?->label() ?? '-')
                    ->badge(),
                TextColumn::make('description')
                    ->label('Descripcion')
                    ->limit(40)
                    ->placeholder('-'),
                TextColumn::make('total')
                    ->label('Total')
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
