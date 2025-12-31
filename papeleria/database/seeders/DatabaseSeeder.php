<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\ProductSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\ServicePricingRuleSeeder;
use Database\Seeders\ServiceConsumableSeeder;
use Database\Seeders\BundleSeeder;
use Database\Seeders\BundleItemSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderItemSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    
    public function run(): void
    {
        $this->call([ProductSeeder::class, ServiceSeeder::class, ServicePricingRuleSeeder::class, ServiceConsumableSeeder::class, BundleSeeder::class, BundleItemSeeder::class, CustomerSeeder::class, OrderSeeder::class, OrderItemSeeder::class,]);
    }
}
