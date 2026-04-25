<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $fillable = ['name','description', 'stock', 'price'];

    protected $casts = [
        'stock' => 'integer',
        'price' => 'float',
    ];

    public function items()
    {
        return $this->hasMany(BundleItem::class);
    }

    public function getStockStatusLabelAttribute(): string
    {
        return match (true) {
            $this->stock <= 0 => 'Sin stock',
            $this->stock <= 3 => 'Stock bajo',
            default => 'En stock',
        };
    }

    public function getStockStatusColorAttribute(): string
    {
        return match ($this->stock_status_label) {
            'Sin stock' => 'danger',
            'Stock bajo' => 'warning',
            default => 'success',
        };
    }

    public function getCostTotalAttribute(): float
    {
        \Illuminate\Support\Facades\Log::debug('Bundle::getCostTotalAttribute called', ['bundle_id' => $this->id]);

        try {
            return app(\App\Services\BundlePricingService::class)->costTotal($this);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Bundle::getCostTotalAttribute failed', ['bundle_id' => $this->id, 'error' => $e->getMessage()]);
            return 0.0;
        }
    }

    public function getEffectivePriceAttribute(): float
    {
        return $this->price ?? $this->cost_total;
    }
}
