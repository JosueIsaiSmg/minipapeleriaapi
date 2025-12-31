<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Product; 
use App\Models\Service; 
use App\Models\Bundle;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        // Pedido 1: hojas blancas
        OrderItem::create([
            'order_id' => 1,
            'item_type' => Product::class,
            'item_id' => 1,
            'quantity' => 1,
            'unit_price' => 80,
        ]);

        // Pedido 2: servicio de impresión
        OrderItem::create([
            'order_id' => 2,
            'item_type' => Service::class,
            'item_id' => 1,
            'quantity' => 50,
            'unit_price' => 4,
        ]);
    }
}
