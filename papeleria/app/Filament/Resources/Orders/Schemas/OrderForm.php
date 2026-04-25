<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\ItemType;
use App\Enums\OrderStatus;
use App\Filament\Resources\Customers\Schemas\CustomerForm;
use App\Forms\OrderItemPreview;
use App\Models\Bundle;
use App\Models\Product;
use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use App\Forms\ItemSelect;
use App\Forms\ItemTypeSelect;
use App\Forms\VariantSelect;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->label('Cliente')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(CustomerForm::components())
                    ->createOptionUsing(function (array $data): int {
                        return \App\Models\Customer::create($data)->getKey();
                    })
                    ->required(),
                Select::make('status')
                    ->label('Estado')
                    ->required()
                    ->options(OrderStatus::options())
                    ->default('pending'),
                TextInput::make('total')
                    ->numeric()
                    ->label('Total')
                    ->readOnly()
                    ->helperText('Se calcula automaticamente con los productos o servicios.')
                    ->default(0)
                    ->minValue(0)
                    ->prefix('$'),
                Textarea::make('description')
                    ->label('Descripcion')
                    ->rows(4)
                    ->columnSpanFull(),
                FileUpload::make('photo_paths')
                    ->label('Fotos subidas')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->directory('orders/photos')
                    ->imagePreviewHeight('120')
                    ->reorderable()
                    ->columnSpanFull(),
                TagsInput::make('photo_links')
                    ->label('Links de fotos')
                    ->placeholder('https://example.com/photo.jpg')
                    ->columnSpanFull(),
                Repeater::make('order_items')
                    ->label('Conceptos de la orden')
                    ->schema([
                        ItemTypeSelect::make()
                            ->afterStateUpdated(fn (Get $get, Set $set) => self::updateTotal($get, $set)),
                        ItemSelect::make()
                            ->afterStateUpdated(fn (Get $get, Set $set) => self::updateTotal($get, $set)),
                        TextInput::make('quantity')
                            ->label('Cantidad')
                            ->integer()
                            ->required()
                            ->minValue(1)
                            ->live()
                            ->afterStateUpdated(fn (Get $get, Set $set) => self::updateTotal($get, $set)),
                        VariantSelect::make()
                            ->afterStateUpdated(fn (Get $get, Set $set) => self::updateTotal($get, $set)),
                        OrderItemPreview::priceField(),
                        OrderItemPreview::conditionField(),
                        OrderItemPreview::stockField(),
                    ])
                    ->defaultItems(0)
                    ->itemLabel(fn (array $state): ?string => self::resolveItemLabel($state))
                    ->reorderable(false)
                    ->collapsible()
                    ->columnSpanFull()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        self::updateTotal($get, $set);
                    }),
            ]);
    }

    public static function updateTotal(Get $get, Set $set): void
    {
        // Try to get items from current scope or parent scopes
        $items = $get('order_items') ?? $get('../../order_items') ?? [];
        $total = 0;

        foreach ($items as $item) {
            $itemType = $item['item_type'] ?? null;
            $itemId = $item['item_id'] ?? null;
            $quantity = $item['quantity'] ?? 0;
            $variant = data_get($item, 'meta.variant');

            if (blank($itemType) || blank($itemId) || blank($quantity)) {
                continue;
            }

            try {
                $resolved = app(\App\Services\OrderItemResolver::class)->resolve(
                    itemType: ItemType::from($itemType),
                    itemId: (int) $itemId,
                    quantity: (int) $quantity,
                    meta: array_filter([
                        'variant' => filled($variant) ? $variant : null,
                    ]),
                );

                $total += ($resolved['unit_price'] ?? 0) * $quantity;
            } catch (\Throwable) {
                // Silently ignore errors during live calculation
            }
        }

        $roundedTotal = round($total, 2);

        // Set total in current scope or parent scope
        if ($get('total') !== null) {
            $set('total', $roundedTotal);
        } elseif ($get('../../total') !== null) {
            $set('../../total', $roundedTotal);
        }
    }

    protected static function resolveItemLabel(array $state): ?string
    {
        $itemType = $state['item_type'] ?? null;
        $itemId = $state['item_id'] ?? null;

        if (blank($itemType) || blank($itemId)) {
            return 'Nuevo concepto';
        }

        $modelClass = match ($itemType) {
            ItemType::Product->value => Product::class,
            ItemType::Service->value => Service::class,
            ItemType::Bundle->value => Bundle::class,
            default => null,
        };

        if (! $modelClass) {
            return 'Nuevo concepto';
        }

        $name = $modelClass::query()->whereKey($itemId)->value('name') ?? 'Concepto';
        $variant = data_get($state, 'meta.variant');
        $quantity = $state['quantity'] ?? null;

        if (filled($variant)) {
            $name .= " ({$variant})";
        }

        if (filled($quantity)) {
            $name .= " x{$quantity}";
        }

        return $name;
    }
}
