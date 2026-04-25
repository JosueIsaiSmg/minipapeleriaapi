<?php

namespace App\Filament\Resources\BundleItems\Pages;

use App\Filament\Resources\BundleItems\BundleItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBundleItems extends ListRecords
{
    protected static string $resource = BundleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
