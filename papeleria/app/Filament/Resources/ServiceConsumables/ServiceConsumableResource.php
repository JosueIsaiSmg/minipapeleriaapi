<?php

namespace App\Filament\Resources\ServiceConsumables;

use App\Filament\Resources\ServiceConsumables\Pages\CreateServiceConsumable;
use App\Filament\Resources\ServiceConsumables\Pages\EditServiceConsumable;
use App\Filament\Resources\ServiceConsumables\Pages\ListServiceConsumables;
use App\Filament\Resources\ServiceConsumables\Pages\ViewServiceConsumable;
use App\Filament\Resources\ServiceConsumables\Schemas\ServiceConsumableForm;
use App\Filament\Resources\ServiceConsumables\Schemas\ServiceConsumableInfolist;
use App\Filament\Resources\ServiceConsumables\Tables\ServiceConsumablesTable;
use App\Models\ServiceConsumable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceConsumableResource extends Resource
{
    protected static ?string $model = ServiceConsumable::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ServiceConsumable';

    public static function form(Schema $schema): Schema
    {
        return ServiceConsumableForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServiceConsumableInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceConsumablesTable::configure($table);
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
            'index' => ListServiceConsumables::route('/'),
            'create' => CreateServiceConsumable::route('/create'),
            'view' => ViewServiceConsumable::route('/{record}'),
            'edit' => EditServiceConsumable::route('/{record}/edit'),
        ];
    }
}
