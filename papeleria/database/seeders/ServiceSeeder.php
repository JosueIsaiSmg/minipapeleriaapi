<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create(['name' => 'Impresión', 'description' => 'Impresión de documentos']);
        Service::create(['name' => 'Enmicado', 'description' => 'Protección de documentos en mica']);
        Service::create(['name' => 'Engargolado', 'description' => 'Engargolado de hojas con espiral']);
    }
}
