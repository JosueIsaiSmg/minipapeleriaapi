<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceConsumable;

class ServiceConsumableSeeder extends Seeder
{
    public function run(): void
    {
        // Impresión consume hojas blancas
        ServiceConsumable::create([
            'service_id' => 1,
            'product_id' => 1,
            'units_per_service' => 1,
        ]);

        // Impresión en opalina consume hojas opalina
        ServiceConsumable::create([
            'service_id' => 1,
            'product_id' => 2,
            'units_per_service' => 1,
            'material' => 'opalina',
        ]);
    }
}
