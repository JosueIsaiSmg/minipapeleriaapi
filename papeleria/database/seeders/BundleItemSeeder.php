<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BundleItem;
use App\Models\Product;
use App\Models\Service;

class BundleItemSeeder extends Seeder
{
    public function run(): void
    {
        // Kit Escolar incluye hojas blancas
        BundleItem::create([
            'bundle_id' => 1,
            'item_type' => Product::class,
            'item_id' => 1,
            'quantity' => 1,
        ]);

        // Kit Escolar incluye servicio de impresión
        BundleItem::create([
            'bundle_id' => 1,
            'item_type' => Service::class,
            'item_id' => 1,
            'quantity' => 1,
        ]);
    }
}
