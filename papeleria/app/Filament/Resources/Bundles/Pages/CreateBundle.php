<?php

namespace App\Filament\Resources\Bundles\Pages;

use App\Filament\Resources\Bundles\BundleResource;
use App\Services\BundleWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Resources\Pages\CreateRecord;

class CreateBundle extends CreateRecord
{
    protected static string $resource = BundleResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(BundleWorkflowService::class)->create($data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
