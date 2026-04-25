<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use App\Forms\ItemSelect;
use App\Forms\ItemTypeSelect;
use App\Forms\OrderItemPreview;
use App\Forms\VariantSelect;
use App\Services\OrderItemWorkflowService;
use App\Support\FilamentSaveAlert;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\ItemType;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Conceptos de la orden';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            ItemTypeSelect::make(),
            ItemSelect::make(),
            TextInput::make('quantity')
                ->label('Cantidad')
                ->integer()
                ->required()
                ->minValue(1)
                ->live(),
            VariantSelect::make(),
            OrderItemPreview::priceField(),
            OrderItemPreview::conditionField(),
            OrderItemPreview::stockField(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('item.name')
                ->label('Concepto')
                ->searchable(),
            TextColumn::make('item_type')
                ->label('Tipo')
                ->formatStateUsing(fn(ItemType $state) => $state->label()),
            TextColumn::make('quantity')
                ->label('Cantidad')
                ->sortable(),
            TextColumn::make('meta.variant')
                ->label('Variante')
                ->placeholder('-'),
            TextColumn::make('applied_condition_label')
                ->label('Condicion aplicada')
                ->wrap()
                ->placeholder('-'),
            TextColumn::make('unit_price')
                ->label('Precio unitario')
                ->money('USD')
                ->sortable(),
            TextColumn::make('stock_label')
                ->label('Inventario')
                ->badge()
                ->color(fn (string $state): string => $state === 'En stock' ? 'success' : 'danger'),
        ])
            ->headerActions([
                CreateAction::make()
                    ->using(function (array $data) {
                        try {
                            $data['order_id'] = $this->getOwnerRecord()->getKey();

                            return app(OrderItemWorkflowService::class)->create($data);
                        } catch (\Throwable $exception) {
                            FilamentSaveAlert::notifyAndThrow($exception);
                        }
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->using(function ($record, array $data) {
                        try {
                            $data['order_id'] = $this->getOwnerRecord()->getKey();

                            return app(OrderItemWorkflowService::class)->update($record, $data);
                        } catch (\Throwable $exception) {
                            FilamentSaveAlert::notifyAndThrow($exception);
                        }
                    }),
                DeleteAction::make()
                    ->action(function ($record): void {
                        app(OrderItemWorkflowService::class)->delete($record);
                    }),
            ]);
    }
}
