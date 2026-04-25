<?php

namespace Tests\Unit;

use App\Enums\ItemType;
use App\Models\Bundle;
use App\Models\Category;
use App\Models\Product;
use App\Services\BundleItemWorkflowService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class BundleItemWorkflowServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_fails_when_product_quantity_exceeds_stock(): void
    {
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $bundle = Bundle::create([
            'name' => 'Kit escolar',
            'description' => 'Bundle demo',
            'stock' => 5,
        ]);

        $product = Product::create([
            'name' => 'Cartulina',
            'description' => 'Cartulina base',
            'price' => 14,
            'stock' => 2,
            'category_id' => $category->id,
        ]);

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('No hay stock suficiente. Cartulina: requiere 5, disponible 2.');

        app(BundleItemWorkflowService::class)->create([
            'bundle_id' => $bundle->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $product->id,
            'quantity' => 5,
        ]);
    }
}
