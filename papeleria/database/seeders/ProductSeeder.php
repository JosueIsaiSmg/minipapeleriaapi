<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $paper = Category::updateOrCreate(
            ['name' => 'Papel'],
            ['description' => 'Papeles y consumibles de impresion.'],
        );
        $lamination = Category::updateOrCreate(
            ['name' => 'Enmicado'],
            ['description' => 'Micas y materiales para proteger documentos.'],
        );
        $binding = Category::updateOrCreate(
            ['name' => 'Encuadernacion'],
            ['description' => 'Arillos, espirales y materiales de engargolado.'],
        );
        $decor = Category::updateOrCreate(
            ['name' => 'Decoracion'],
            ['description' => 'Productos decorativos para regalos y eventos.'],
        );
        $party = Category::updateOrCreate(
            ['name' => 'Fiestas'],
            ['description' => 'Articulos para celebraciones y mesas de fiesta.'],
        );

        $whiteLetter = Product::updateOrCreate(['name' => 'Hojas blancas carta'], [
            'description' => 'Paquete de hojas bond tamano carta.',
            'price' => 80,
            'stock' => 1500,
            'category_id' => $paper->id,
        ]);

        $whiteA4 = Product::updateOrCreate(['name' => 'Hojas blancas A4'], [
            'description' => 'Paquete de hojas bond tamano A4.',
            'price' => 95,
            'stock' => 800,
            'category_id' => $paper->id,
        ]);

        $opalina = Product::updateOrCreate(['name' => 'Hojas opalina'], [
            'description' => 'Paquete de hojas opalina para impresiones especiales.',
            'price' => 120,
            'stock' => 300,
            'category_id' => $paper->id,
        ]);

        $cardstock = Product::updateOrCreate(['name' => 'Cartulina'], [
            'description' => 'Cartulina disponible en varios colores.',
            'price' => 14,
            'stock' => 200,
            'category_id' => $paper->id,
        ]);

        Product::updateOrCreate(['name' => 'Mica para enmicado 3 mm'], [
            'description' => 'Material para enmicado delgado.',
            'price' => 18,
            'stock' => 120,
            'category_id' => $lamination->id,
        ]);

        Product::updateOrCreate(['name' => 'Mica para enmicado 5 mm'], [
            'description' => 'Material para enmicado grueso.',
            'price' => 25,
            'stock' => 90,
            'category_id' => $lamination->id,
        ]);

        Product::updateOrCreate(['name' => 'Arillo chico'], [
            'description' => 'Arillo para documentos pequenos.',
            'price' => 6,
            'stock' => 100,
            'category_id' => $binding->id,
        ]);

        Product::updateOrCreate(['name' => 'Arillo mediano'], [
            'description' => 'Arillo para documentos medianos.',
            'price' => 8,
            'stock' => 80,
            'category_id' => $binding->id,
        ]);

        Product::updateOrCreate(['name' => 'Velas decorativas'], [
            'description' => 'Velas para cumpleanos y decoracion.',
            'price' => 25,
            'stock' => 200,
            'category_id' => $party->id,
        ]);

        $balloons = Product::updateOrCreate(['name' => 'Globo latex'], [
            'description' => 'Globo unitario para decoracion de eventos.',
            'price' => 3,
            'stock' => 500,
            'category_id' => $party->id,
        ]);

        $decorPaper = Product::updateOrCreate(['name' => 'Papel china'], [
            'description' => 'Papel decorativo ligero para manualidades y fiestas.',
            'price' => 12,
            'stock' => 250,
            'category_id' => $decor->id,
        ]);

        $giftBag = Product::updateOrCreate(['name' => 'Bolsa de regalo'], [
            'description' => 'Bolsa para empaque y presentacion de regalos.',
            'price' => 18,
            'stock' => 90,
            'category_id' => $decor->id,
        ]);

        $this->syncVariants($whiteLetter, ['75 g', '90 g']);
        $this->syncVariants($whiteA4, ['75 g', '90 g']);
        $this->syncVariants($opalina, ['Blanca', 'Marfil']);
        $this->syncVariants($cardstock, [
            ['name' => 'Blanca', 'price' => 14, 'stock' => 80],
            ['name' => 'Roja', 'price' => 16, 'stock' => 40],
            ['name' => 'Azul', 'price' => 16, 'stock' => 35],
            ['name' => 'Verde', 'price' => 16, 'stock' => 25],
        ]);
        $this->syncVariants($balloons, ['Rojo', 'Azul', 'Dorado', 'Pastel']);
        $this->syncVariants($decorPaper, ['Rojo', 'Rosa', 'Azul cielo']);
        $this->syncVariants($giftBag, ['Chica', 'Mediana', 'Grande']);
    }

    protected function syncVariants(Product $product, array $variants): void
    {
        $morphType = $product->getMorphClass();
        $names = collect($variants)
            ->map(fn ($variant) => is_array($variant) ? $variant['name'] : $variant)
            ->all();

        $product->variants()
            ->whereNotIn('name', $names)
            ->delete();

        foreach ($variants as $variant) {
            $name = is_array($variant) ? $variant['name'] : $variant;
            $price = is_array($variant) ? ($variant['price'] ?? null) : null;
            $stock = is_array($variant) ? ($variant['stock'] ?? null) : null;

            Variant::updateOrCreate(
                [
                    'variantable_type' => $morphType,
                    'variantable_id' => $product->id,
                    'name' => $name,
                ],
                ['description' => null, 'price' => $price, 'stock' => $stock],
            );
        }
    }
}
