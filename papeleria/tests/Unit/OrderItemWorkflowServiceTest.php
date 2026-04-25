<?php

namespace Tests\Unit;

use App\Enums\ItemType;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderItemWorkflowService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderItemWorkflowServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_calculates_unit_price_without_direct_model_insert_data(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'workflow@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $product = Product::create([
            'name' => 'Cartulina',
            'description' => 'Cartulina base',
            'price' => 14,
            'stock' => 20,
            'category_id' => $category->id,
        ]);

        $item = app(OrderItemWorkflowService::class)->create([
            'order_id' => $order->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $product->id,
            'quantity' => 2,
            'meta' => [],
        ]);

        $this->assertSame(14.0, $item->unit_price);
        $this->assertSame(28.0, $order->fresh()->total);
        $this->assertSame(18, $product->fresh()->stock);
    }
}
