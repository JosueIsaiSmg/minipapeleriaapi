<?php

namespace App\Filament\Resources\Bundles\RelationManagers;

use App\Forms\ItemSelect;
use App\Forms\ItemTypeSelect;
use App\Services\BundleItemWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Enums\ItemType;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Conceptos del bundle';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            ItemTypeSelect::make(),
            ItemSelect::make(),
            TextInput::make('quantity')
                ->numeric()
                ->label('Cantidad')
                ->required()
                ->minValue(1),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('item.name')->label('Concepto'),
            TextColumn::make('item_type')->label('Tipo de item')->formatStateUsing(fn(ItemType $state) => $state->label()),
            TextColumn::make('quantity')->label('Cantidad')->sortable(),
        ])
            ->headerActions([
                CreateAction::make()
                    ->using(function (array $data) {
                        try {
                            $data['bundle_id'] = $this->getOwnerRecord()->getKey();

                            return app(BundleItemWorkflowService::class)->create($data);
                        } catch (\Throwable $exception) {
                            FilamentSaveAlert::notifyAndThrow($exception);
                        }
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->using(function ($record, array $data) {
                        try {
                            $data['bundle_id'] = $this->getOwnerRecord()->getKey();

                            return app(BundleItemWorkflowService::class)->update($record, $data);
                        } catch (\Throwable $exception) {
                            FilamentSaveAlert::notifyAndThrow($exception);
                        }
                    }),
                DeleteAction::make(),
            ]);
    }
}
