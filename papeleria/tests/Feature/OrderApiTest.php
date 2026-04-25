<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_accepts_description_photo_paths_and_links(): void
    {
        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente@example.com',
        ]);

        $response = $this->postJson('/api/orders', [
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 199.99,
            'description' => 'Pedido con referencias visuales',
            'photo_paths' => ['orders/photos/example-1.jpg'],
            'photo_links' => ['https://example.com/photo-1.jpg'],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('description', 'Pedido con referencias visuales')
            ->assertJsonPath('photo_paths.0', 'orders/photos/example-1.jpg')
            ->assertJsonPath('photo_links.0', 'https://example.com/photo-1.jpg');

        $this->assertDatabaseHas('orders', [
            'customer_id' => $customer->id,
            'status' => 'pending',
            'description' => 'Pedido con referencias visuales',
        ]);
    }

    public function test_index_returns_orders_with_related_items_and_customer(): void
    {
        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente@example.com',
        ]);

        Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 49.99,
            'description' => 'Orden simple',
            'photo_paths' => ['orders/photos/example-2.jpg'],
            'photo_links' => ['https://example.com/photo-2.jpg'],
        ]);

        $response = $this->getJson('/api/orders');

        $response
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.customer.name', 'Cliente Demo')
            ->assertJsonPath('0.description', 'Orden simple')
            ->assertJsonPath('0.photo_paths.0', 'orders/photos/example-2.jpg')
            ->assertJsonPath('0.photo_links.0', 'https://example.com/photo-2.jpg');
    }
}
