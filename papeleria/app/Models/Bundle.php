<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $fillable = ['name','description'];

    public function items()
    {
        return $this->hasMany(BundleItem::class);
    }
}
