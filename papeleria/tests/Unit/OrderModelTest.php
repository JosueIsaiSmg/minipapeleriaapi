<?php

namespace Tests\Unit;

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderModelTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $reflection = new \ReflectionClass(Order::class);
        $property = $reflection->getProperty('persistableColumnsCache');
        $property->setAccessible(true);
        $property->setValue(null, null);
    }

    public function test_filter_persistable_attributes_removes_unknown_columns(): void
    {
        Schema::shouldReceive('hasTable')
            ->once()
            ->andReturn(true);

        Schema::shouldReceive('getColumnListing')
            ->once()
            ->andReturn(['id', 'customer_id', 'total', 'status', 'created_at', 'updated_at']);

        $filtered = Order::filterPersistableAttributes([
            'customer_id' => 1,
            'total' => 0,
            'status' => 'pending',
            'description' => 'No existe en esta base',
            'photo_paths' => ['orders/photos/a.jpg'],
            'photo_links' => ['https://example.com/a.jpg'],
        ]);

        $this->assertSame([
            'customer_id' => 1,
            'total' => 0,
            'status' => 'pending',
        ], $filtered);
    }

    public function test_filter_persistable_attributes_keeps_media_columns_when_they_exist(): void
    {
        Schema::shouldReceive('hasTable')
            ->once()
            ->andReturn(true);

        Schema::shouldReceive('getColumnListing')
            ->once()
            ->andReturn([
                'id',
                'customer_id',
                'total',
                'status',
                'description',
                'photo_paths',
                'photo_links',
                'created_at',
                'updated_at',
            ]);

        $filtered = Order::filterPersistableAttributes([
            'customer_id' => 1,
            'total' => 0,
            'status' => 'pending',
            'description' => 'Si existe',
            'photo_paths' => ['orders/photos/a.jpg'],
            'photo_links' => ['https://example.com/a.jpg'],
        ]);

        $this->assertSame([
            'customer_id' => 1,
            'total' => 0,
            'status' => 'pending',
            'description' => 'Si existe',
            'photo_paths' => ['orders/photos/a.jpg'],
            'photo_links' => ['https://example.com/a.jpg'],
        ], $filtered);
    }
}
