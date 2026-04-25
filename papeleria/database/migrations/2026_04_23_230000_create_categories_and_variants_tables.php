<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Variant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('variants')) {
            Schema::create('variants', function (Blueprint $table) {
                $table->id();
                $table->morphs('variantable');
                $table->string('name');
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasColumn('products', 'category_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('stock')->constrained()->nullOnDelete();
            });
        }

        if (Schema::hasColumn('products', 'category')) {
            Product::query()
                ->whereNotNull('category')
                ->where('category', '!=', '')
                ->get()
                ->each(function (Product $product): void {
                    $category = Category::query()->firstOrCreate([
                        'name' => $product->category,
                    ]);

                    $product->updateQuietly([
                        'category_id' => $category->id,
                    ]);
                });
        }

        Service::query()->get()->each(function (Service $service): void {
            $morphType = $service->getMorphClass();
            $names = collect($service->pricingRules()->pluck('variant'))
                ->merge($service->consumables()->pluck('variant'))
                ->filter()
                ->unique()
                ->values();

            foreach ($names as $name) {
                Variant::query()->firstOrCreate([
                    'variantable_type' => $morphType,
                    'variantable_id' => $service->id,
                    'name' => $name,
                ]);
            }
        });

        if (Schema::hasColumn('products', 'category')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('products', 'category')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('category')->nullable()->after('stock');
            });
        }

        Product::query()->with('categoryRelation')->get()->each(function (Product $product): void {
            $product->updateQuietly([
                'category' => $product->categoryRelation?->name,
            ]);
        });

        if (Schema::hasColumn('products', 'category_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropConstrainedForeignId('category_id');
            });
        }

        if (Schema::hasTable('variants')) {
            Schema::drop('variants');
        }

        if (Schema::hasTable('categories')) {
            Schema::drop('categories');
        }
    }
};
