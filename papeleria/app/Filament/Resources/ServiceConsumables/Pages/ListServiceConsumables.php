<?php

namespace App\Filament\Resources\ServiceConsumables\Pages;

use App\Filament\Resources\ServiceConsumables\ServiceConsumableResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceConsumables extends ListRecords
{
    protected static string $resource = ServiceConsumableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
