<?php

namespace App\Services;

use App\Enums\ItemType;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderItemWorkflowService
{
    public function __construct(
        protected OrderItemResolver $resolver,
        protected OrderItemStockManager $stockManager,
    ) {}

    public function create(array $validated): OrderItem
    {
        return DB::transaction(function () use ($validated): OrderItem {
            $payload = $this->buildPayload($validated);
            $this->stockManager->assertAvailable($payload['meta']);

            $orderItem = OrderItem::create($payload);
            $this->stockManager->consume($orderItem->meta ?? []);
            $this->resolver->syncOrderTotal($orderItem->order);

            return $orderItem->load('order', 'item');
        });
    }

    public function update(OrderItem $orderItem, array $validated): OrderItem
    {
        return DB::transaction(function () use ($orderItem, $validated): OrderItem {
            $originalOrder = $orderItem->order;
            $originalMeta = $orderItem->meta;

            $this->stockManager->restore($originalMeta);

            $payload = $this->buildPayload($validated);
            $this->stockManager->assertAvailable($payload['meta']);

            $orderItem->update($payload);
            $this->stockManager->consume($orderItem->meta ?? []);
            $this->resolver->syncOrderTotal($orderItem->order);

            if ($originalOrder->isNot($orderItem->order)) {
                $this->resolver->syncOrderTotal($originalOrder);
            }

            return $orderItem->load('order', 'item');
        });
    }

    public function delete(OrderItem $orderItem): void
    {
        DB::transaction(function () use ($orderItem): void {
            $order = $orderItem->order;
            $this->stockManager->restore($orderItem->meta);
            $orderItem->delete();
            $this->resolver->syncOrderTotal($order);
        });
    }

    public function buildPayload(array $validated): array
    {
        $itemType = ItemType::from($validated['item_type']);
        $itemType->findModelOrFail((int) $validated['item_id']);

        $resolved = $this->resolver->resolve(
            itemType: $itemType,
            itemId: (int) $validated['item_id'],
            quantity: (int) $validated['quantity'],
            meta: $validated['meta'] ?? [],
        );

        return [
            'order_id' => (int) $validated['order_id'],
            'item_type' => $itemType->value,
            'item_id' => (int) $validated['item_id'],
            'quantity' => (int) $validated['quantity'],
            'unit_price' => $resolved['unit_price'],
            'meta' => $resolved['meta'],
        ];
    }
}
