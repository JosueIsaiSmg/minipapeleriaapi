<?php

namespace App\Filament\Resources\Bundles;

use App\Filament\Resources\Bundles\Pages\CreateBundle;
use App\Filament\Resources\Bundles\Pages\EditBundle;
use App\Filament\Resources\Bundles\Pages\ListBundles;
use App\Filament\Resources\Bundles\Pages\ViewBundle;
use App\Filament\Resources\Bundles\RelationManagers\ItemsRelationManager;
use App\Filament\Resources\Bundles\Schemas\BundleForm;
use App\Filament\Resources\Bundles\Schemas\BundleInfolist;
use App\Filament\Resources\Bundles\Tables\BundlesTable;
use App\Models\Bundle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BundleResource extends Resource
{
    protected static ?string $model = Bundle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BundleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BundleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BundlesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBundles::route('/'),
            'create' => CreateBundle::route('/create'),
            'view' => ViewBundle::route('/{record}'),
            'edit' => EditBundle::route('/{record}/edit'),
        ];
    }
}
