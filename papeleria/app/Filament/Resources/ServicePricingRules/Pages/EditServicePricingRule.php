<?php

namespace App\Filament\Resources\ServicePricingRules\Pages;

use App\Filament\Resources\ServicePricingRules\ServicePricingRuleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditServicePricingRule extends EditRecord
{
    protected static string $resource = ServicePricingRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
