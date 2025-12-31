<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'name' => 'Juan Pérez',
            'phone' => '555-1234',
            'email' => 'juan@example.com',
        ]);

        Customer::create([
            'name' => 'María López',
            'phone' => '555-5678',
            'email' => 'maria@example.com',
        ]);
    }
}
