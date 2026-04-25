<?php

namespace App\Forms;

use App\Enums\ItemType;
use Filament\Forms\Components\Select;

class ItemTypeSelect
{
    public static function make(): Select
    {
        return Select::make('item_type')
            ->label('Tipo de item')
            ->options(collect(ItemType::cases())->mapWithKeys(fn ($case) => [
                $case->value => $case->label(),
            ]))
            ->required()
            ->live()
            ->reactive();
    }
}
