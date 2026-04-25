<?php

namespace App\Filament\Resources\BundleItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Forms\ItemSelect;
use App\Forms\ItemTypeSelect;

class BundleItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('bundle_id')
                    ->relationship('bundle', 'name')
                    ->label('Bundle')
                    ->required(),
                ItemTypeSelect::make(),
                ItemSelect::make(),
                TextInput::make('quantity')
                    ->numeric()
                    ->label('Cantidad')
                    ->required(),
            ]);
    }
}
