<?php

namespace App\Filament\Resources\BundleItems\Pages;

use App\Filament\Resources\BundleItems\BundleItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBundleItem extends ViewRecord
{
    protected static string $resource = BundleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
