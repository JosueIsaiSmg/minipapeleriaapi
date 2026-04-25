<?php

namespace Tests\Feature;

use App\Enums\ItemType;
use App\Models\Bundle;
use App\Models\BundleItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilamentBundlePagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_bundle_pages_load_for_authenticated_user(): void
    {
        $user = User::factory()->create();
        $bundle = Bundle::create([
            'name' => 'Kit escolar',
            'description' => 'Bundle demo',
            'stock' => 5,
            'price' => 50,
        ]);

        $this->actingAs($user)
            ->get('/admin/bundles')
            ->assertOk();

        $this->actingAs($user)
            ->get('/admin/bundles/create')
            ->assertOk();

        $this->actingAs($user)
            ->get("/admin/bundles/{$bundle->id}")
            ->assertOk();

        $this->actingAs($user)
            ->get("/admin/bundles/{$bundle->id}/edit")
            ->assertOk();
    }

    public function test_bundle_item_pages_load_for_authenticated_user(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => 'Papel',
        ]);

        $product = Product::create([
            'name' => 'Cartulina',
            'description' => 'Cartulina base',
            'price' => 15,
            'stock' => 20,
            'category_id' => $category->id,
        ]);

        $bundle = Bundle::create([
            'name' => 'Kit escolar',
            'description' => 'Bundle demo',
            'stock' => 5,
            'price' => 50,
        ]);

        $bundleItem = BundleItem::create([
            'bundle_id' => $bundle->id,
            'item_type' => ItemType::Product,
            'item_id' => $product->id,
            'quantity' => 2,
        ]);

        $this->actingAs($user)
            ->get('/admin/bundle-items')
            ->assertOk();

        $this->actingAs($user)
            ->get('/admin/bundle-items/create')
            ->assertOk();

        $this->actingAs($user)
            ->get("/admin/bundle-items/{$bundleItem->id}")
            ->assertOk();

        $this->actingAs($user)
            ->get("/admin/bundle-items/{$bundleItem->id}/edit")
            ->assertOk();
    }
}
