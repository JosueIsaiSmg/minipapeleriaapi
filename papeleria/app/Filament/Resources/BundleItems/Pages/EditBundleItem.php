<?php

namespace App\Filament\Resources\BundleItems\Pages;

use App\Filament\Resources\BundleItems\BundleItemResource;
use App\Services\BundleItemWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBundleItem extends EditRecord
{
    protected static string $resource = BundleItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(BundleItemWorkflowService::class)->update($record, $data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
