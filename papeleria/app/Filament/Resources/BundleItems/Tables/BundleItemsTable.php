<?php

namespace App\Filament\Resources\BundleItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\ItemType;

class BundleItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('bundle.name')->label('Bundle')->sortable()->searchable(),
                TextColumn::make('item_type')->label('Tipo')->sortable()->formatStateUsing(fn(ItemType $state) => $state->label()),
                TextColumn::make('item.name')->label('Concepto'),
                TextColumn::make('quantity')->label('Cantidad')->sortable(),
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
