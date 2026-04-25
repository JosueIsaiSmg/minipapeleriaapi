<?php

namespace App\Models;
use App\Enums\ItemType;

use Illuminate\Database\Eloquent\Model;

class BundleItem extends Model
{
    protected $fillable = ['bundle_id','item_type','item_id','quantity'];

    protected $casts = [ 'item_type' => ItemType::class];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }

    // Polimórfico: puede ser producto o servicio
    public function item()
    {
        return $this->morphTo();
    }

    public function getResolvedUnitCostAttribute(): float
    {
        \Illuminate\Support\Facades\Log::debug('BundleItem::getResolvedUnitCostAttribute called', ['bundle_item_id' => $this->id, 'bundle_id' => $this->bundle_id, 'item_type' => ($this->item_type?->value ?? null)]);

        try {
            return (float) app(\App\Services\OrderItemResolver::class)->resolve(
                itemType: $this->item_type,
                itemId: (int) $this->item_id,
                quantity: (int) $this->quantity,
                meta: [],
            )['unit_price'];
        } catch (\Throwable) {
            return 0.0;
        }
    }

    public function getResolvedSubtotalAttribute(): float
    {
        return round($this->resolved_unit_cost * (int) $this->quantity, 2);
    }
}
