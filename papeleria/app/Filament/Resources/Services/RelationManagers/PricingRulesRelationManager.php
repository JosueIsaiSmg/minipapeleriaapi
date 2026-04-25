<?php

namespace App\Filament\Resources\Services\RelationManagers;

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

class PricingRulesRelationManager extends RelationManager
{
    protected static string $relationship = 'pricingRules';

    protected static ?string $title = 'Reglas de precio';

    public function form(Schema $schema): Schema
    {
        $morphType = $this->getOwnerRecord()->getMorphClass();

        return $schema->components([
            Select::make('variant')
                ->label('Variante')
                ->options(fn (): array => Variant::query()
                    ->where('variantable_type', $morphType)
                    ->where('variantable_id', $this->getOwnerRecord()->getKey())
                    ->orderBy('name')
                    ->pluck('name', 'name')
                    ->toArray())
                ->searchable()
                ->preload()
                ->helperText('Dejalo vacio si solo cambia por cantidad. Usa esta pantalla para capturar rangos y precios.')
                ->reactive(),
            TextInput::make('min_quantity')
                ->label('Cantidad minima')
                ->integer()
                ->minValue(1),
            TextInput::make('max_quantity')
                ->label('Cantidad maxima')
                ->integer()
                ->minValue(1),
            TextInput::make('price')
                ->label('Precio')
                ->numeric()
                ->required()
                ->minValue(0)
                ->prefix('$'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('variant')
                    ->label('Variante')
                    ->placeholder('-'),
                TextColumn::make('min_quantity')
                    ->label('Minimo')
                    ->numeric()
                    ->placeholder('-'),
                TextColumn::make('max_quantity')
                    ->label('Maximo')
                    ->numeric()
                    ->placeholder('-'),
                TextColumn::make('price')
                    ->label('Precio')
                    ->money('USD')
                    ->sortable(),
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
