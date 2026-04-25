<?php

namespace App\Filament\Resources\Services\RelationManagers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Variant;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ConsumablesRelationManager extends RelationManager
{
    protected static string $relationship = 'consumables';

    protected static ?string $title = 'Consumibles';

    public function form(Schema $schema): Schema
    {
        $morphType = $this->getOwnerRecord()->getMorphClass();

        return $schema->components([
            Select::make('product_id')
                ->relationship('product', 'name')
                ->label('Producto')
                ->searchable()
                ->preload()
                ->live()
                ->required(),
            Select::make('product_variant_id')
                ->label('Variante del producto')
                ->options(function (callable $get): array {
                    $productId = $get('product_id');

                    if (blank($productId)) {
                        return [];
                    }

                    $product = Product::query()->find($productId);

                    if (! $product) {
                        return [];
                    }

                    return $product->variants()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->toArray();
                })
                ->searchable()
                ->preload()
                ->helperText('Opcional. Si la seleccionas, este consumible usara el stock de esa variante.'),
            TextInput::make('units_per_service')
                ->label('Unidades por servicio')
                ->numeric()
                ->required()
                ->minValue(0.001)
                ->step('0.001'),
            Select::make('variant')
                ->label('Variante')
                ->options(fn (): array => Variant::query()
                    ->where('variantable_type', $morphType)
                    ->where('variantable_id', $this->getOwnerRecord()->getKey())
                    ->orderBy('name')
                    ->pluck('name', 'name')
                    ->toArray())
                ->searchable()
                ->preload(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
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
                    ->placeholder('-'),
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
