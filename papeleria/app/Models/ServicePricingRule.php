<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePricingRule extends Model
{
    protected $fillable = [
        'service_id', 'variant', 'min_quantity', 'max_quantity', 'price'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'min_quantity' => 'integer',
        'max_quantity' => 'integer',
        'price' => 'float',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
