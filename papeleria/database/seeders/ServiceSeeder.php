<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Variant;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $printing = Service::updateOrCreate(
            ['name' => 'Impresion'],
            ['description' => 'Impresion de documentos en distintos materiales y tamanos.'],
        );

        $lamination = Service::updateOrCreate(
            ['name' => 'Enmicado'],
            ['description' => 'Proteccion de documentos con mica de distintos calibres.'],
        );

        $binding = Service::updateOrCreate(
            ['name' => 'Engargolado'],
            ['description' => 'Engargolado de hojas con arillo segun el volumen del documento.'],
        );

        $this->syncVariants($printing, ['Hoja blanca carta', 'Hoja blanca A4', 'Opalina']);
        $this->syncVariants($lamination, ['3 mm', '5 mm']);
        $this->syncVariants($binding, ['Arillo chico', 'Arillo mediano']);
    }

    protected function syncVariants(Service $service, array $names): void
    {
        $morphType = $service->getMorphClass();

        $service->variants()
            ->whereNotIn('name', $names)
            ->delete();

        foreach ($names as $name) {
            Variant::updateOrCreate(
                [
                    'variantable_type' => $morphType,
                    'variantable_id' => $service->id,
                    'name' => $name,
                ],
                ['description' => null],
            );
        }
    }
}
