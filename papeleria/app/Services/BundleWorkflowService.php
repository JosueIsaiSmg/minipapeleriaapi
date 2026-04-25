<?php

namespace App\Services;

use App\Models\Bundle;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BundleWorkflowService
{
    public function __construct(
        protected BundleItemWorkflowService $bundleItemWorkflow,
        protected BundlePricingService $pricing,
    ) {}

    public function create(array $attributes): Bundle
    {
        return DB::transaction(function () use ($attributes): Bundle {
            $items = $this->extractItems($attributes);
            $bundle = Bundle::create(Arr::only($attributes, ['name', 'description', 'stock', 'price']));

            if ($items !== null) {
                $this->syncItems($bundle, $items);
            }

            if (blank($bundle->price)) {
                $bundle->update([
                    'price' => $this->pricing->costTotal($bundle),
                ]);
            }

            return $bundle->load('items.item');
        });
    }

    public function update(Bundle $bundle, array $attributes): Bundle
    {
        return DB::transaction(function () use ($bundle, $attributes): Bundle {
            $items = $this->extractItems($attributes);
            $bundle->update(Arr::only($attributes, ['name', 'description', 'stock', 'price']));

            if ($items !== null) {
                $bundle->items()->delete();
                $this->syncItems($bundle, $items);
            }

            if (blank($bundle->price)) {
                $bundle->update([
                    'price' => $this->pricing->costTotal($bundle),
                ]);
            }

            return $bundle->load('items.item');
        });
    }

    protected function syncItems(Bundle $bundle, array $items): void
    {
        foreach ($items as $item) {
            $payload = $this->bundleItemWorkflow->buildPayload([
                'bundle_id' => $bundle->id,
                'item_type' => $item['item_type'],
                'item_id' => $item['item_id'],
                'quantity' => $item['quantity'],
            ]);

            $bundle->items()->create(Arr::only($payload, ['item_type', 'item_id', 'quantity']));
        }
    }

    protected function extractItems(array &$attributes): ?array
    {
        $items = Arr::pull($attributes, 'bundle_items');

        return $items === null ? null : array_values($items);
    }
}
