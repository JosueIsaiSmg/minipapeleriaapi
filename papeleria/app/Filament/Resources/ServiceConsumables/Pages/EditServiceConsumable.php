<?php

namespace App\Filament\Resources\ServiceConsumables\Pages;

use App\Filament\Resources\ServiceConsumables\ServiceConsumableResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceConsumable extends EditRecord
{
    protected static string $resource = ServiceConsumableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
