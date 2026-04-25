<?php

namespace App\Filament\Resources\Bundles\Pages;

use App\Filament\Resources\Bundles\BundleResource;
use App\Services\BundleWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBundle extends EditRecord
{
    protected static string $resource = BundleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['bundle_items'] = $this->record->items
            ->map(fn ($item) => [
                'item_type' => $item->item_type->value,
                'item_id' => $item->item_id,
                'quantity' => $item->quantity,
            ])
            ->all();

        return $data;
    }

    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        try {
            return app(BundleWorkflowService::class)->update($record, $data);
        } catch (\Throwable $exception) {
            FilamentSaveAlert::notifyAndThrow($exception);
        }
    }
}
