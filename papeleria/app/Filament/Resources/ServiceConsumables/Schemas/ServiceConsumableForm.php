<?php

namespace App\Filament\Resources\ServiceConsumables\Schemas;

use App\Models\Product;
use App\Models\Service;
use App\Models\Variant;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceConsumableForm
{
    public static function configure(Schema $schema): Schema
    {
        $morphType = (new Service)->getMorphClass();

        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->label('Servicio')
                    ->searchable()
                    ->preload()
                    ->required(),
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
                    ->options(function (callable $get): array {
                        $serviceId = $get('service_id');

                        if (blank($serviceId)) {
                            return [];
                        }

                        return Variant::query()
                            ->where('variantable_type', $morphType)
                            ->where('variantable_id', $serviceId)
                            ->orderBy('name')
                            ->pluck('name', 'name')
                            ->toArray();
                    })
                    ->searchable()
                    ->preload()
                    ->helperText('Ejemplos: opalina, carta, oficio.')
                    ->reactive(),
            ]);
    }
}
