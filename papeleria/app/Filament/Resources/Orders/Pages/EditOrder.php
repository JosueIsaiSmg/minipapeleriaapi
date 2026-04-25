<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use App\Services\OrderWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['order_items'] = $this->record->items
            ->map(fn ($item) => [
                'item_type' => $item->item_type->value,
                'item_id' => $item->item_id,
                'quantity' => $item->quantity,
                'meta' => $item->meta ?? [],
            ])
            ->all();

        return $data;
    }

    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(OrderWorkflowService::class)->update($record, $data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
