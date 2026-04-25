<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','stock','category_id'];

    protected $casts = [
        'price' => 'float',
        'stock' => 'integer',
        'category_id' => 'integer',
    ];

    // Un producto puede ser consumido por varios servicios
    public function serviceConsumables()
    {
        return $this->hasMany(ServiceConsumable::class);
    }

    // Un producto puede estar en varios bundles
    public function bundleItems()
    {
        return $this->morphMany(BundleItem::class, 'item');
    }

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function variants()
    {
        return $this->morphMany(Variant::class, 'variantable');
    }
}
