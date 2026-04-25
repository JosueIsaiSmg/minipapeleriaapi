<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $b = App\Models\Bundle::query()->with('items.item')->first();
    echo json_encode(['id' => $b?->id, 'cost_total' => $b?->cost_total]) . PHP_EOL;
    if ($b && $b->items->isNotEmpty()) {
        echo json_encode(['item0_resolved' => $b->items->first()->resolved_unit_cost]) . PHP_EOL;
    }
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
}
