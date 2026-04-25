<?php

namespace App\Filament\Resources\OrderItems\Pages;

use App\Filament\Resources\OrderItems\OrderItemResource;
use App\Services\OrderItemWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItem extends CreateRecord
{
    protected static string $resource = OrderItemResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(OrderItemWorkflowService::class)->create($data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
