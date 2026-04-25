<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceConsumable extends Model
{
    protected $fillable = ['service_id','product_id','product_variant_id','units_per_service','variant'];

    protected $casts = [
        'service_id' => 'integer',
        'product_id' => 'integer',
        'product_variant_id' => 'integer',
        'units_per_service' => 'float',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(Variant::class, 'product_variant_id');
    }
}
