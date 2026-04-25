<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bundle;

class BundleSeeder extends Seeder
{
    public function run(): void
    {
        Bundle::updateOrCreate(
            ['name' => 'Kit Escolar Basico'],
            ['description' => 'Paquete de hojas y un servicio base de impresion.', 'stock' => 5, 'price' => 15],
        );

        Bundle::updateOrCreate(
            ['name' => 'Kit Fiesta Basico'],
            ['description' => 'Globo y velas para celebracion rapida.', 'stock' => 8, 'price' => 80],
        );
    }
}
