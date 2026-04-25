<?php

use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('variants')
            ->where('variantable_type', Product::class)
            ->update(['variantable_type' => (new Product)->getMorphClass()]);

        DB::table('variants')
            ->where('variantable_type', Service::class)
            ->update(['variantable_type' => (new Service)->getMorphClass()]);
    }

    public function down(): void
    {
        DB::table('variants')
            ->where('variantable_type', (new Product)->getMorphClass())
            ->update(['variantable_type' => Product::class]);

        DB::table('variants')
            ->where('variantable_type', (new Service)->getMorphClass())
            ->update(['variantable_type' => Service::class]);
    }
};
