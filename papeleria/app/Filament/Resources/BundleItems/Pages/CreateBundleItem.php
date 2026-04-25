<?php

namespace App\Filament\Resources\BundleItems\Pages;

use App\Filament\Resources\BundleItems\BundleItemResource;
use App\Services\BundleItemWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Resources\Pages\CreateRecord;

class CreateBundleItem extends CreateRecord
{
    protected static string $resource = BundleItemResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(BundleItemWorkflowService::class)->create($data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
