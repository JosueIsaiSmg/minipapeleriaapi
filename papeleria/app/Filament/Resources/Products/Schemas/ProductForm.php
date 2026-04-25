<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripcion')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Precio')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('stock')
                    ->label('Stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('category_id')
                    ->relationship('categoryRelation', 'name')
                    ->label('Categoria')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required(),
                        TextInput::make('description')
                            ->label('Descripcion'),
                    ])
                    ->createOptionUsing(function (array $data): int {
                        return Category::create($data)->getKey();
                    }),
            ]);
    }
}
