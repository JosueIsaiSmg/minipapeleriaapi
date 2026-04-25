<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['variantable_type', 'variantable_id', 'name', 'description', 'price', 'stock'];

    protected $casts = [
        'price' => 'float',
        'stock' => 'integer',
    ];

    public function variantable()
    {
        return $this->morphTo();
    }
}
