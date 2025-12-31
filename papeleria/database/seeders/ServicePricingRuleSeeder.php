<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePricingRule;
use App\Models\Service;

class ServicePricingRuleSeeder extends Seeder
{
    public function run(): void
    {
        $service = Service::first(); // o crea uno si no existe
        $rule = ServicePricingRule::create([
            'service_id' => 1,
            'min_quantity' => 1,
            'max_quantity' => 100,
            'price' => 4,
            'condition_type' => 'quantity',
        ]);

        // Impresión normal
        ServicePricingRule::create([
            'service_id' => 1,
            'min_quantity' => 1,
            'max_quantity' => 100,
            'price' => 4,
            'condition_type' => 'quantity',
        ]);

        // Impresión preferencial
        ServicePricingRule::create([
            'service_id' => 1,
            'min_quantity' => 101,
            'price' => 2.5,
            'condition_type' => 'quantity',
        ]);

        // Impresión en opalina
        ServicePricingRule::create([
            'service_id' => 1,
            'material' => 'opalina',
            'price' => 5,
            'condition_type' => 'material',
        ]);

        // Engargolado hasta 30 hojas
        ServicePricingRule::create([
            'service_id' => 3,
            'min_quantity' => 30,
            'max_quantity' => 30,
            'price' => 20,
            'condition_type' => 'quantity',
        ]);

        // Engargolado 31–70 hojas
        ServicePricingRule::create([
            'service_id' => 3,
            'min_quantity' => 31,
            'max_quantity' => 70,
            'price' => 25,
            'condition_type' => 'quantity',
        ]);
    }
}
