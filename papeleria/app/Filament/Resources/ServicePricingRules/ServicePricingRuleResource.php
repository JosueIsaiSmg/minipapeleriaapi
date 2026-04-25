<?php

namespace App\Filament\Resources\ServicePricingRules;

use App\Filament\Resources\ServicePricingRules\Pages\CreateServicePricingRule;
use App\Filament\Resources\ServicePricingRules\Pages\EditServicePricingRule;
use App\Filament\Resources\ServicePricingRules\Pages\ListServicePricingRules;
use App\Filament\Resources\ServicePricingRules\Pages\ViewServicePricingRule;
use App\Filament\Resources\ServicePricingRules\Schemas\ServicePricingRuleForm;
use App\Filament\Resources\ServicePricingRules\Schemas\ServicePricingRuleInfolist;
use App\Filament\Resources\ServicePricingRules\Tables\ServicePricingRulesTable;
use App\Models\ServicePricingRule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServicePricingRuleResource extends Resource
{
    protected static ?string $model = ServicePricingRule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ServicePricingRule';

    public static function form(Schema $schema): Schema
    {
        return ServicePricingRuleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServicePricingRuleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicePricingRulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServicePricingRules::route('/'),
            'create' => CreateServicePricingRule::route('/create'),
            'view' => ViewServicePricingRule::route('/{record}'),
            'edit' => EditServicePricingRule::route('/{record}/edit'),
        ];
    }
}
