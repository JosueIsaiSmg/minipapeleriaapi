<?php

namespace App\Filament\Resources\ServicePricingRules\Pages;

use App\Filament\Resources\ServicePricingRules\ServicePricingRuleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewServicePricingRule extends ViewRecord
{
    protected static string $resource = ServicePricingRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
