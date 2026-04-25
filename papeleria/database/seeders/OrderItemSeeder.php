<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\ItemType;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Services\OrderWorkflowService;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $workflow = app(OrderWorkflowService::class);

        $juan = Customer::query()->where('email', 'juan@example.com')->firstOrFail();
        $maria = Customer::query()->where('email', 'maria@example.com')->firstOrFail();
        $teofo = Customer::query()->where('email', 'teofo@example.com')->firstOrFail();

        $printing = Service::query()->where('name', 'Impresion')->firstOrFail();
        $lamination = Service::query()->where('name', 'Enmicado')->firstOrFail();
        $balloons = Product::query()->where('name', 'Globo latex')->firstOrFail();
        $candles = Product::query()->where('name', 'Velas decorativas')->firstOrFail();

        $workflow->update(
            Order::query()->where('description', 'Pedido demo impresion carta')->firstOrFail(),
            [
                'customer_id' => $juan->id,
                'status' => 'pending',
                'description' => 'Pedido demo impresion carta',
                'order_items' => [
                    [
                        'item_type' => ItemType::Service->value,
                        'item_id' => $printing->id,
                        'quantity' => 100,
                        'meta' => ['variant' => 'Hoja blanca carta'],
                    ],
                ],
            ],
        );

        $workflow->update(
            Order::query()->where('description', 'Pedido demo opalina y enmicado')->firstOrFail(),
            [
                'customer_id' => $maria->id,
                'status' => 'confirmed',
                'description' => 'Pedido demo opalina y enmicado',
                'order_items' => [
                    [
                        'item_type' => ItemType::Service->value,
                        'item_id' => $printing->id,
                        'quantity' => 25,
                        'meta' => ['variant' => 'Opalina'],
                    ],
                    [
                        'item_type' => ItemType::Service->value,
                        'item_id' => $lamination->id,
                        'quantity' => 2,
                        'meta' => ['variant' => '3 mm'],
                    ],
                ],
            ],
        );

        $workflow->update(
            Order::query()->where('description', 'Pedido demo fiestas')->firstOrFail(),
            [
                'customer_id' => $teofo->id,
                'status' => 'completed',
                'description' => 'Pedido demo fiestas',
                'order_items' => [
                    [
                        'item_type' => ItemType::Product->value,
                        'item_id' => $balloons->id,
                        'quantity' => 30,
                        'meta' => ['variant' => 'Rojo'],
                    ],
                    [
                        'item_type' => ItemType::Product->value,
                        'item_id' => $candles->id,
                        'quantity' => 1,
                    ],
                ],
            ],
        );
    }
}
