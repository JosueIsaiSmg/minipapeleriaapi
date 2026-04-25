<?php

namespace App\Filament\Resources\ServicePricingRules\Schemas;

use App\Models\Service;
use App\Models\Variant;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServicePricingRuleForm
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
                    ->helperText('Dejalo vacio si la regla depende solo de cantidad.')
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
}
