<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use App\Services\OrderWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(OrderWorkflowService::class)->create($data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
