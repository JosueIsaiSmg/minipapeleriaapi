<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BundleItem;
use App\Models\ServicePricingRule;
use App\Models\ServiceConsumable;

class Service extends Model
{
    protected $fillable = ['name','description'];

    // Reglas de precios dinámicos
    public function pricingRules()
    {
        return $this->hasMany(ServicePricingRule::class);
    }

    // Consumibles asociados
    public function consumables()
    {
        return $this->hasMany(ServiceConsumable::class);
    }

    // Puede estar en bundles
    public function bundleItems()
    {
        return $this->morphMany(BundleItem::class, 'item');
    }
}
