<?php

namespace App\Services;

use App\Models\Bundle;

class BundlePricingService
{
    public function __construct(
        protected OrderItemResolver $resolver,
    ) {}

    public function costTotal(Bundle $bundle): float
    {
        $bundle->loadMissing('items.item');

        $total = 0.0;

        foreach ($bundle->items as $item) {
            $resolved = $this->resolver->resolve(
                itemType: $item->item_type,
                itemId: (int) $item->item_id,
                quantity: (int) $item->quantity,
                meta: [],
            );

            $total += ((float) $resolved['unit_price']) * (int) $item->quantity;
        }

        return round($total, 2);
    }
}
