<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id','item_type','item_id','quantity','unit_price','meta'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Polimórfico: puede ser producto, servicio o bundle
    public function item()
    {
        return $this->morphTo();
    }
}
