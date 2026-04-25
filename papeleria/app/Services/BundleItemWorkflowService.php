<?php

namespace App\Services;

use App\Enums\ItemType;
use App\Models\BundleItem;
use Illuminate\Support\Facades\DB;

class BundleItemWorkflowService
{
    public function __construct(
        protected OrderItemResolver $resolver,
        protected OrderItemStockManager $stockManager,
    ) {}

    public function create(array $validated): BundleItem
    {
        return DB::transaction(function () use ($validated): BundleItem {
            $payload = $this->buildPayload($validated);
            BundleItem::create($payload);

            return BundleItem::query()->with('bundle', 'item')->latest('id')->firstOrFail();
        });
    }

    public function update(BundleItem $bundleItem, array $validated): BundleItem
    {
        return DB::transaction(function () use ($bundleItem, $validated): BundleItem {
            $payload = $this->buildPayload($validated);
            $bundleItem->update($payload);

            return $bundleItem->load('bundle', 'item');
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

        $this->stockManager->assertAvailable($resolved['meta']);

        return [
            'bundle_id' => (int) $validated['bundle_id'],
            'item_type' => $itemType->value,
            'item_id' => (int) $validated['item_id'],
            'quantity' => (int) $validated['quantity'],
        ];
    }
}
