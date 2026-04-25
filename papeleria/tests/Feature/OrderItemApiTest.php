<?php

namespace Tests\Feature;

use App\Enums\ItemType;
use App\Models\Bundle;
use App\Models\BundleItem;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceConsumable;
use App\Models\ServicePricingRule;
use App\Models\Variant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderItemApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_order_item_resolves_pricing_rule_and_stock(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $paper = Product::create([
            'name' => 'Hojas bond',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $paper->id,
            'units_per_service' => 2,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 10,
            'price' => 12.5,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 3,
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('unit_price', 12.5)
            ->assertJsonPath('meta.stock.in_stock', true)
            ->assertJsonPath('meta.pricing_rule.tipo', 'cantidad')
            ->assertJsonPath('meta.consumables.0.required_units', 6);

        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 3,
            'unit_price' => 12.5,
        ]);

        $this->assertSame(37.5, $order->fresh()->total);
        $this->assertSame(4, $paper->fresh()->stock);
    }

    public function test_product_order_item_fails_when_quantity_exceeds_inventory(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $product = Product::create([
            'name' => 'Opalina',
            'description' => 'Papel opalina',
            'price' => 15.75,
            'stock' => 2,
            'category_id' => $category->id,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $product->id,
            'quantity' => 5,
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['item_id'])
            ->assertJsonPath('errors.item_id.0', 'No hay stock suficiente. Opalina: requiere 5, disponible 2.');

        $this->assertDatabaseCount('order_items', 0);
        $this->assertSame(2, $product->fresh()->stock);
        $this->assertSame(0.0, $order->fresh()->total);
    }

    public function test_product_order_item_uses_variant_price_when_available(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente@example.com',
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

        Variant::create([
            'variantable_type' => $product->getMorphClass(),
            'variantable_id' => $product->id,
            'name' => 'Roja',
            'price' => 16,
            'stock' => 7,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $product->id,
            'quantity' => 2,
            'meta' => [
                'variant' => 'Roja',
            ],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('unit_price', 16)
            ->assertJsonPath('meta.variant', 'Roja')
            ->assertJsonPath('meta.pricing_rule.condition_label', 'Variante: Roja');

        $this->assertSame(32.0, $order->fresh()->total);
        $this->assertSame(20, $product->fresh()->stock);
        $this->assertSame(5, $product->variants()->where('name', 'Roja')->firstOrFail()->stock);
    }

    public function test_product_order_item_fails_when_variant_stock_is_not_enough(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente-variant-stock@example.com',
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

        Variant::create([
            'variantable_type' => $product->getMorphClass(),
            'variantable_id' => $product->id,
            'name' => 'Verde',
            'price' => 16,
            'stock' => 2,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $product->id,
            'quantity' => 5,
            'meta' => [
                'variant' => 'Verde',
            ],
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['item_id'])
            ->assertJsonPath('errors.item_id.0', 'No hay stock suficiente. Cartulina (Verde): requiere 5, disponible 2.');

        $this->assertSame(20, $product->fresh()->stock);
        $this->assertSame(2, $product->variants()->where('name', 'Verde')->firstOrFail()->stock);
    }

    public function test_bundle_order_item_resolves_price_and_consumes_stock(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Bundle',
            'phone' => '5551234568',
            'email' => 'cliente-bundle@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $paper = Product::create([
            'name' => 'Hojas bond',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 50,
            'category_id' => $category->id,
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $paper->id,
            'units_per_service' => 1,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 10,
            'price' => 4,
        ]);

        $bundle = Bundle::create([
            'name' => 'Kit escolar',
            'description' => 'Incluye 2 impresiones',
            'stock' => 5,
        ]);

        BundleItem::create([
            'bundle_id' => $bundle->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 2,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Bundle->value,
            'item_id' => $bundle->id,
            'quantity' => 3,
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('unit_price', 8)
            ->assertJsonPath('meta.pricing_rule.condition_label', 'Bundle: Kit escolar')
            ->assertJsonPath('meta.bundle_breakdown.0.line_total', 8);

        $this->assertSame(24.0, $order->fresh()->total);
        $this->assertSame(2, $bundle->fresh()->stock);
        $this->assertSame(44, $paper->fresh()->stock);
    }

    public function test_bundle_order_item_fails_when_nested_items_do_not_have_stock(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Bundle',
            'phone' => '5551234568',
            'email' => 'cliente-bundle-stock@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $paper = Product::create([
            'name' => 'Hojas bond',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 4,
            'category_id' => $category->id,
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $paper->id,
            'units_per_service' => 1,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 10,
            'price' => 4,
        ]);

        $bundle = Bundle::create([
            'name' => 'Kit escolar',
            'description' => 'Incluye 2 impresiones',
            'stock' => 5,
        ]);

        BundleItem::create([
            'bundle_id' => $bundle->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 2,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Bundle->value,
            'item_id' => $bundle->id,
            'quantity' => 3,
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['item_id'])
            ->assertJsonPath('errors.item_id.0', 'No hay stock suficiente. Hojas bond: requiere 6, disponible 4.');

        $this->assertSame(4, $paper->fresh()->stock);
        $this->assertSame(0.0, $order->fresh()->total);
    }

    public function test_bundle_order_item_fails_when_bundle_stock_is_not_enough(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Bundle',
            'phone' => '5551234568',
            'email' => 'cliente-bundle-own-stock@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $paper = Product::create([
            'name' => 'Hojas bond',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 50,
            'category_id' => $category->id,
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $paper->id,
            'units_per_service' => 1,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 10,
            'price' => 4,
        ]);

        $bundle = Bundle::create([
            'name' => 'Kit escolar',
            'description' => 'Incluye 2 impresiones',
            'stock' => 5,
        ]);

        BundleItem::create([
            'bundle_id' => $bundle->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 2,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Bundle->value,
            'item_id' => $bundle->id,
            'quantity' => 6,
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['item_id'])
            ->assertJsonPath('errors.item_id.0', 'No hay stock suficiente. Kit escolar: requiere 6, disponible 5.');

        $this->assertSame(5, $bundle->fresh()->stock);
        $this->assertSame(50, $paper->fresh()->stock);
        $this->assertSame(0.0, $order->fresh()->total);
    }

    public function test_service_order_item_fails_when_consumable_stock_is_not_enough(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente-stock-servicio@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $paper = Product::create([
            'name' => 'Hojas blancas',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 5,
            'category_id' => $category->id,
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $paper->id,
            'units_per_service' => 2,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 10,
            'price' => 4,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 3,
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['item_id'])
            ->assertJsonPath('errors.item_id.0', 'No hay stock suficiente. Hojas blancas: requiere 6, disponible 5.');

        $this->assertSame(5, $paper->fresh()->stock);
        $this->assertSame(0.0, $order->fresh()->total);
    }

    public function test_service_order_item_uses_variant_specific_consumable_and_price(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $whitePaper = Product::create([
            'name' => 'Hojas blancas',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 100,
            'category_id' => $category->id,
        ]);

        $opalina = Product::create([
            'name' => 'Hojas opalina',
            'description' => 'Papel opalina',
            'price' => 120,
            'stock' => 150,
            'category_id' => $category->id,
        ]);

        $opalinaVariant = Variant::create([
            'variantable_type' => $opalina->getMorphClass(),
            'variantable_id' => $opalina->id,
            'name' => 'Marfil',
            'stock' => 150,
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $whitePaper->id,
            'units_per_service' => 1,
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $opalina->id,
            'product_variant_id' => $opalinaVariant->id,
            'units_per_service' => 1,
            'variant' => 'opalina',
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 99,
            'price' => 4,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 100,
            'price' => 2,
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'variant' => 'opalina',
            'price' => 10,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 100,
            'meta' => [
                'variant' => 'opalina',
            ],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('unit_price', 10)
            ->assertJsonPath('meta.pricing_rule.tipo', 'variante')
            ->assertJsonPath('meta.consumables.0.product_name', 'Hojas opalina');

        $this->assertSame(100, $whitePaper->fresh()->stock);
        $this->assertSame(150, $opalina->fresh()->stock);
        $this->assertSame(50, $opalinaVariant->fresh()->stock);
        $this->assertSame(1000.0, $order->fresh()->total);
    }

    public function test_service_order_item_fails_when_consumable_variant_stock_is_not_enough(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $customer = Customer::create([
            'name' => 'Cliente Demo',
            'phone' => '5551234567',
            'email' => 'cliente-service-variant@example.com',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $product = Product::create([
            'name' => 'Cartulina',
            'description' => 'Cartulina base',
            'price' => 20,
            'stock' => 100,
            'category_id' => $category->id,
        ]);

        $variant = Variant::create([
            'variantable_type' => $product->getMorphClass(),
            'variantable_id' => $product->id,
            'name' => 'Roja',
            'stock' => 2,
        ]);

        $service = Service::create([
            'name' => 'Corte especial',
            'description' => 'Servicio con cartulina por color',
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $product->id,
            'product_variant_id' => $variant->id,
            'units_per_service' => 1,
            'variant' => 'cartulina roja',
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'variant' => 'cartulina roja',
            'price' => 18,
        ]);

        $response = $this->postJson('/api/order-items', [
            'order_id' => $order->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $service->id,
            'quantity' => 5,
            'meta' => [
                'variant' => 'cartulina roja',
            ],
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['item_id'])
            ->assertJsonPath('errors.item_id.0', 'No hay stock suficiente. Cartulina (Roja): requiere 5, disponible 2.');

        $this->assertSame(100, $product->fresh()->stock);
        $this->assertSame(2, $variant->fresh()->stock);
        $this->assertSame(0.0, $order->fresh()->total);
    }
}
