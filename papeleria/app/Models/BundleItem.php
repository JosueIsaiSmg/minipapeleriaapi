<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BundleItem extends Model
{
    protected $fillable = ['bundle_id','item_type','item_id','quantity'];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }

    // Polimórfico: puede ser producto o servicio
    public function item()
    {
        return $this->morphTo();
    }
}
