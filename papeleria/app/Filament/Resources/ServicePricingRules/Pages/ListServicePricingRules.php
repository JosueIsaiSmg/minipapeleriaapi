<?php

namespace App\Filament\Resources\ServicePricingRules\Pages;

use App\Filament\Resources\ServicePricingRules\ServicePricingRuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServicePricingRules extends ListRecords
{
    protected static string $resource = ServicePricingRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
