<?php

namespace App\Filament\Resources\OrderItems\Pages;

use App\Filament\Resources\OrderItems\OrderItemResource;
use App\Services\OrderItemWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOrderItem extends EditRecord
{
    protected static string $resource = OrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->action(function (): void {
                    app(OrderItemWorkflowService::class)->delete($this->record);
                    $this->redirect(static::getResource()::getUrl('index'));
                }),
        ];
    }

    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(OrderItemWorkflowService::class)->update($record, $data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
