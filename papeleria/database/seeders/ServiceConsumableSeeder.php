<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceConsumable;
use App\Models\Variant;

class ServiceConsumableSeeder extends Seeder
{
    public function run(): void
    {
        $printing = Service::query()->where('name', 'Impresion')->firstOrFail();
        $lamination = Service::query()->where('name', 'Enmicado')->firstOrFail();
        $binding = Service::query()->where('name', 'Engargolado')->firstOrFail();

        $whiteLetter = Product::query()->where('name', 'Hojas blancas carta')->firstOrFail();
        $whiteA4 = Product::query()->where('name', 'Hojas blancas A4')->firstOrFail();
        $opalina = Product::query()->where('name', 'Hojas opalina')->firstOrFail();
        $opalinaMarfil = Variant::query()
            ->where('variantable_type', $opalina->getMorphClass())
            ->where('variantable_id', $opalina->id)
            ->where('name', 'Marfil')
            ->first();
        $mica3 = Product::query()->where('name', 'Mica para enmicado 3 mm')->firstOrFail();
        $mica5 = Product::query()->where('name', 'Mica para enmicado 5 mm')->firstOrFail();
        $arilloChico = Product::query()->where('name', 'Arillo chico')->firstOrFail();

        $this->upsertConsumable([
            'service_id' => $printing->id,
            'product_id' => $whiteLetter->id,
            'units_per_service' => 1,
        ]);

        $this->upsertConsumable([
            'service_id' => $printing->id,
            'product_id' => $whiteLetter->id,
            'units_per_service' => 1,
            'variant' => 'Hoja blanca carta',
        ]);

        $this->upsertConsumable([
            'service_id' => $printing->id,
            'product_id' => $whiteA4->id,
            'units_per_service' => 1,
            'variant' => 'Hoja blanca A4',
        ]);

        $this->upsertConsumable([
            'service_id' => $printing->id,
            'product_id' => $opalina->id,
            'product_variant_id' => $opalinaMarfil?->id,
            'units_per_service' => 1,
            'variant' => 'Opalina',
        ]);

        $this->upsertConsumable([
            'service_id' => $lamination->id,
            'product_id' => $mica3->id,
            'units_per_service' => 1,
            'variant' => '3 mm',
        ]);

        $this->upsertConsumable([
            'service_id' => $lamination->id,
            'product_id' => $mica5->id,
            'units_per_service' => 1,
            'variant' => '5 mm',
        ]);

        $this->upsertConsumable([
            'service_id' => $binding->id,
            'product_id' => $arilloChico->id,
            'units_per_service' => 1,
        ]);
    }

    protected function upsertConsumable(array $attributes): void
    {
        ServiceConsumable::updateOrCreate(
            [
                'service_id' => $attributes['service_id'],
                'product_id' => $attributes['product_id'],
                'product_variant_id' => $attributes['product_variant_id'] ?? null,
                'variant' => $attributes['variant'] ?? null,
            ],
            ['units_per_service' => $attributes['units_per_service']],
        );
    }
}
