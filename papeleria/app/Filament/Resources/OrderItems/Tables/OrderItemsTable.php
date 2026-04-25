<?php

namespace App\Filament\Resources\OrderItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Enums\ItemType;

class OrderItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('order_id')->label('Orden')->sortable()->searchable(),
                TextColumn::make('item_type')->label('Tipo')->formatStateUsing(fn(ItemType $state) => $state->label()),
                TextColumn::make('item.name')->label('Concepto')->searchable(),
                TextColumn::make('meta.variant')->label('Variante')->placeholder('-'),
                TextColumn::make('applied_condition_label')->label('Condicion aplicada')->wrap()->placeholder('-'),
                TextColumn::make('quantity')->label('Cantidad')->sortable(),
                TextColumn::make('unit_price')->label('Precio unitario')->sortable(),
                TextColumn::make('stock_label')
                    ->label('Inventario')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'En stock' ? 'success' : 'danger'),
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
