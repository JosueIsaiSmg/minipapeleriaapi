<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::updateOrCreate(['email' => 'juan@example.com'], [
            'name' => 'Juan Pérez',
            'phone' => '555-1234',
            'social_profile_url' => 'https://instagram.com/juan',
            'facebook_url' => 'https://facebook.com/juan',
        ]);

        Customer::updateOrCreate(['email' => 'maria@example.com'], [
            'name' => 'María López',
            'phone' => '555-5678',
            'social_profile_url' => 'https://instagram.com/maria',
            'facebook_url' => 'https://facebook.com/maria',
        ]);

        Customer::updateOrCreate(['email' => 'teofo@example.com'], [
            'name' => 'Teofo',
            'phone' => '555-8899',
            'social_profile_url' => 'https://instagram.com/teofo',
            'facebook_url' => 'https://facebook.com/teofo',
        ]);
    }
}
