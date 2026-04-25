<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\ItemType;
use App\Models\Bundle;
use App\Models\BundleItem;
use App\Models\Product;
use App\Models\Service;

class BundleItemSeeder extends Seeder
{
    public function run(): void
    {
        $schoolKit = Bundle::query()->where('name', 'Kit Escolar Basico')->firstOrFail();
        $partyKit = Bundle::query()->where('name', 'Kit Fiesta Basico')->firstOrFail();

        $whiteLetter = Product::query()->where('name', 'Hojas blancas carta')->firstOrFail();
        $balloons = Product::query()->where('name', 'Globo latex')->firstOrFail();
        $candles = Product::query()->where('name', 'Velas decorativas')->firstOrFail();
        $printing = Service::query()->where('name', 'Impresion')->firstOrFail();

        BundleItem::updateOrCreate([
            'bundle_id' => $schoolKit->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $whiteLetter->id,
        ], [
            'quantity' => 1,
        ]);

        BundleItem::updateOrCreate([
            'bundle_id' => $schoolKit->id,
            'item_type' => ItemType::Service->value,
            'item_id' => $printing->id,
        ], [
            'quantity' => 1,
        ]);

        BundleItem::updateOrCreate([
            'bundle_id' => $partyKit->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $balloons->id,
        ], [
            'quantity' => 20,
        ]);

        BundleItem::updateOrCreate([
            'bundle_id' => $partyKit->id,
            'item_type' => ItemType::Product->value,
            'item_id' => $candles->id,
        ], [
            'quantity' => 1,
        ]);
    }
}
