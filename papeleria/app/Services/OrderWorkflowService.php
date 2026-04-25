<?php

namespace App\Services;

use App\Enums\ItemType;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OrderWorkflowService
{
    public function __construct(
        protected OrderItemResolver $resolver,
        protected OrderItemStockManager $stockManager,
    ) {}

    public function create(array $attributes): Order
    {
        return DB::transaction(function () use ($attributes): Order {
            $items = $this->extractItems($attributes);
            $order = Order::create(Order::filterPersistableAttributes($attributes));

            if ($items !== null) {
                $this->syncItems($order, $items);
            }

            return $order->load('customer', 'items.item');
        });
    }

    public function update(Order $order, array $attributes): Order
    {
        return DB::transaction(function () use ($order, $attributes): Order {
            $items = $this->extractItems($attributes);
            $order->update(Order::filterPersistableAttributes($attributes));

            if ($items !== null) {
                $this->replaceItems($order, $items);
            }

            return $order->load('customer', 'items.item');
        });
    }

    public function delete(Order $order): void
    {
        DB::transaction(function () use ($order): void {
            foreach ($order->items as $item) {
                $this->stockManager->restore($item->meta);
            }

            $order->delete();
        });
    }

    public function replaceItems(Order $order, array $items): void
    {
        foreach ($order->items as $existingItem) {
            $this->stockManager->restore($existingItem->meta);
        }

        $order->items()->delete();

        $this->syncItems($order, $items);
    }

    protected function syncItems(Order $order, array $items): void
    {
        foreach ($items as $item) {
            $itemType = ItemType::from($item['item_type']);
            $itemType->findModelOrFail((int) $item['item_id']);

            $resolved = $this->resolver->resolve(
                itemType: $itemType,
                itemId: (int) $item['item_id'],
                quantity: (int) $item['quantity'],
                meta: Arr::get($item, 'meta', []),
            );

            $this->stockManager->assertAvailable($resolved['meta']);

            $orderItem = $order->items()->create([
                'item_type' => $itemType->value,
                'item_id' => (int) $item['item_id'],
                'quantity' => (int) $item['quantity'],
                'unit_price' => $resolved['unit_price'],
                'meta' => $resolved['meta'],
            ]);

            $this->stockManager->consume($orderItem->meta ?? []);
        }

        $this->resolver->syncOrderTotal($order);
    }

    protected function extractItems(array &$attributes): ?array
    {
        $items = Arr::pull($attributes, 'order_items');

        return $items === null ? null : array_values($items);
    }
}
