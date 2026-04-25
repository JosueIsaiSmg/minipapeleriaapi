<?php

namespace App\Filament\Resources\BundleItems;

use App\Filament\Resources\BundleItems\Pages\CreateBundleItem;
use App\Filament\Resources\BundleItems\Pages\EditBundleItem;
use App\Filament\Resources\BundleItems\Pages\ListBundleItems;
use App\Filament\Resources\BundleItems\Pages\ViewBundleItem;
use App\Filament\Resources\BundleItems\Schemas\BundleItemForm;
use App\Filament\Resources\BundleItems\Schemas\BundleItemInfolist;
use App\Filament\Resources\BundleItems\Tables\BundleItemsTable;
use App\Models\BundleItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BundleItemResource extends Resource
{
    protected static ?string $model = BundleItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (request()->route('record')) {
            $data['bundle_id'] = request()->route('record');
        }

        return $data;
    }

    public static function form(Schema $schema): Schema
    {
        return BundleItemForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BundleItemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BundleItemsTable::configure($table);
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
            'index' => ListBundleItems::route('/'),
            'create' => CreateBundleItem::route('/create'),
            'view' => ViewBundleItem::route('/{record}'),
            'edit' => EditBundleItem::route('/{record}/edit'),
        ];
    }
}
