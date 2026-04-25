<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $juan = Customer::query()->where('email', 'juan@example.com')->firstOrFail();
        $maria = Customer::query()->where('email', 'maria@example.com')->firstOrFail();
        $teofo = Customer::query()->where('email', 'teofo@example.com')->firstOrFail();

        Order::updateOrCreate(
            ['description' => 'Pedido demo impresion carta'],
            ['customer_id' => $juan->id, 'total' => 0, 'status' => 'pending'],
        );

        Order::updateOrCreate(
            ['description' => 'Pedido demo opalina y enmicado'],
            ['customer_id' => $maria->id, 'total' => 0, 'status' => 'confirmed'],
        );

        Order::updateOrCreate(
            ['description' => 'Pedido demo fiestas'],
            ['customer_id' => $teofo->id, 'total' => 0, 'status' => 'completed'],
        );
    }
}
