<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServicePricingRule;

class ServicePricingRuleSeeder extends Seeder
{
    public function run(): void
    {
        $printing = Service::query()->where('name', 'Impresion')->firstOrFail();
        $lamination = Service::query()->where('name', 'Enmicado')->firstOrFail();
        $binding = Service::query()->where('name', 'Engargolado')->firstOrFail();

        $this->upsertRule([
            'service_id' => $printing->id,
            'min_quantity' => 1,
            'max_quantity' => 99,
            'price' => 4,
        ]);

        $this->upsertRule([
            'service_id' => $printing->id,
            'min_quantity' => 100,
            'price' => 2,
        ]);

        $this->upsertRule([
            'service_id' => $printing->id,
            'variant' => 'Hoja blanca A4',
            'min_quantity' => 1,
            'max_quantity' => 99,
            'price' => 5,
        ]);

        $this->upsertRule([
            'service_id' => $printing->id,
            'variant' => 'Hoja blanca A4',
            'min_quantity' => 100,
            'price' => 3,
        ]);

        $this->upsertRule([
            'service_id' => $printing->id,
            'variant' => 'Opalina',
            'price' => 10,
        ]);

        $this->upsertRule([
            'service_id' => $lamination->id,
            'variant' => '3 mm',
            'price' => 15,
        ]);

        $this->upsertRule([
            'service_id' => $lamination->id,
            'variant' => '5 mm',
            'price' => 20,
        ]);

        $this->upsertRule([
            'service_id' => $binding->id,
            'min_quantity' => 1,
            'max_quantity' => 30,
            'price' => 20,
        ]);

        $this->upsertRule([
            'service_id' => $binding->id,
            'min_quantity' => 31,
            'max_quantity' => 70,
            'price' => 25,
        ]);

        $this->upsertRule([
            'service_id' => $binding->id,
            'min_quantity' => 71,
            'price' => 30,
        ]);
    }

    protected function upsertRule(array $attributes): void
    {
        ServicePricingRule::updateOrCreate(
            [
                'service_id' => $attributes['service_id'],
                'variant' => $attributes['variant'] ?? null,
                'min_quantity' => $attributes['min_quantity'] ?? null,
                'max_quantity' => $attributes['max_quantity'] ?? null,
            ],
            ['price' => $attributes['price']],
        );
    }
}
