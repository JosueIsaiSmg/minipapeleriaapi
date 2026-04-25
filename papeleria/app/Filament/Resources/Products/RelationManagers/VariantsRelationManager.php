<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    protected static ?string $title = 'Variantes';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nombre')
                ->required()
                ->maxLength(255),
            TextInput::make('description')
                ->label('Descripcion')
                ->maxLength(255),
            TextInput::make('price')
                ->label('Precio de la variante')
                ->numeric()
                ->minValue(0)
                ->prefix('$')
                ->helperText('Opcional. Si lo llenas, esta variante usara este precio en la orden.'),
            TextInput::make('stock')
                ->label('Stock de la variante')
                ->integer()
                ->minValue(0)
                ->helperText('Opcional. Si lo llenas, esta variante usara su propio stock en vez del stock general del producto.'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Descripcion')
                    ->placeholder('-'),
                TextColumn::make('price')
                    ->label('Precio')
                    ->money('USD')
                    ->placeholder('-'),
                TextColumn::make('stock')
                    ->label('Stock')
                    ->numeric()
                    ->placeholder('General'),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
