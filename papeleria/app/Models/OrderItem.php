<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ItemType;

class OrderItem extends Model
{
    protected $fillable = ['order_id','item_type','item_id','quantity','unit_price','meta'];

    protected $casts = [
        'item_type' => ItemType::class,
        'item_id' => 'integer',
        'quantity' => 'integer',
        'unit_price' => 'float',
        'meta' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Polimórfico: puede ser producto, servicio o bundle
    public function item()
    {
        return $this->morphTo();
    }

    public function getInStockAttribute(): bool
    {
        return (bool) data_get($this->meta, 'stock.in_stock', true);
    }

    public function getStockLabelAttribute(): string
    {
        return $this->in_stock ? 'En stock' : 'Sin stock';
    }

    public function getAppliedConditionLabelAttribute(): string
    {
        return (string) data_get($this->meta, 'pricing_rule.condition_label', 'Precio base');
    }

    public function getVariantLabelAttribute(): string
    {
        return (string) data_get($this->meta, 'variant', '-');
    }
}
