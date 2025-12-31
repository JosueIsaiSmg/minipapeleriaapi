<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Hojas blancas tamaño carta',
            'description' => 'Paquete de 500 hojas bond',
            'price' => 80,
            'stock' => 100,
            'category' => 'paper',
        ]);

        Product::create([
            'name' => 'Hojas opalina',
            'description' => 'Paquete de 100 hojas opalina',
            'price' => 120,
            'stock' => 50,
            'category' => 'paper',
        ]);

        Product::create([
            'name' => 'Velas decorativas',
            'description' => 'Velas para cumpleaños',
            'price' => 25,
            'stock' => 200,
            'category' => 'decor',
        ]);
    }
}
