<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bundle;

class BundleSeeder extends Seeder
{
    public function run(): void
    {
        Bundle::create([
            'name' => 'Kit Escolar Básico',
            'description' => 'Paquete de hojas + servicio de impresión',
        ]);
    }
}
