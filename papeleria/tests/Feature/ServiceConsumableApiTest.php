<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceConsumable;
use App\Models\Variant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceConsumableApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_service_consumables_with_relations(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        $product = Product::create([
            'name' => 'Hojas bond',
            'description' => 'Papel bond',
            'price' => 80,
            'stock' => 100,
            'category_id' => $category->id,
        ]);

        ServiceConsumable::create([
            'service_id' => $service->id,
            'product_id' => $product->id,
            'units_per_service' => 1.5,
            'variant' => 'bond',
        ]);

        $response = $this->getJson('/api/service-consumables');

        $response
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.service.name', 'Impresion')
            ->assertJsonPath('0.product.name', 'Hojas bond')
            ->assertJsonPath('0.variant', 'bond');
    }

    public function test_store_persists_decimal_units_per_service(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $service = Service::create([
            'name' => 'Corte',
            'description' => 'Corte de material',
        ]);

        $product = Product::create([
            'name' => 'Cartulina',
            'description' => 'Cartulina opalina',
            'price' => 20,
            'stock' => 50,
            'category_id' => $category->id,
        ]);

        $variant = Variant::create([
            'variantable_type' => $product->getMorphClass(),
            'variantable_id' => $product->id,
            'name' => 'Roja',
            'stock' => 10,
        ]);

        $response = $this->postJson('/api/service-consumables', [
            'service_id' => $service->id,
            'product_id' => $product->id,
            'product_variant_id' => $variant->id,
            'units_per_service' => 0.5,
            'variant' => 'opalina',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('service.name', 'Corte')
            ->assertJsonPath('product.name', 'Cartulina');

        $this->assertDatabaseHas('service_consumables', [
            'service_id' => $service->id,
            'product_id' => $product->id,
            'product_variant_id' => $variant->id,
            'variant' => 'opalina',
        ]);
    }
}
