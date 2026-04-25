<?php

namespace App\Filament\Resources\BundleItems\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use App\Enums\ItemType;

class BundleItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')->label('ID'),
                TextEntry::make('bundle.name')->label('Bundle'),
                TextEntry::make('item_type')->label('Tipo de Item')->formatStateUsing(fn(ItemType $state) => $state->label()),
                TextEntry::make('item.name')->label('Concepto'),
                TextEntry::make('quantity')->label('Cantidad'),
            ]);
    }
}
