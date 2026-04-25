<?php

namespace App\Forms;

use App\Enums\ItemType;
use Filament\Forms\Components\Select;

class ItemSelect
{
    public static function make(): Select
    {
        return Select::make('item_id')
            ->label('Producto, servicio o bundle')
            ->options(function (callable $get) {
                $itemType = $get('item_type');
                return $itemType ? ItemType::from($itemType)->options() : [];
            })
            ->required()
            ->searchable()
            ->live()
            ->reactive();
    }
}
