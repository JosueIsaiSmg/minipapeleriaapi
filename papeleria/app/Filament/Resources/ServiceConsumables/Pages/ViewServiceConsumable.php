<?php

namespace App\Filament\Resources\ServiceConsumables\Pages;

use App\Filament\Resources\ServiceConsumables\ServiceConsumableResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewServiceConsumable extends ViewRecord
{
    protected static string $resource = ServiceConsumableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
