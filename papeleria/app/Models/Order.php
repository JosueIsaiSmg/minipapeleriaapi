<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Order extends Model
{
    protected static ?array $persistableColumnsCache = null;

    protected $fillable = [
        'customer_id',
        'total',
        'status',
        'description',
        'photo_paths',
        'photo_links',
    ];

    protected $casts = [
        'customer_id' => 'integer',
        'total' => 'float',
        'status' => OrderStatus::class,
        'photo_paths' => 'array',
        'photo_links' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getUploadedPhotoUrlsAttribute(): array
    {
        return collect($this->photo_paths ?? [])
            ->filter()
            ->map(fn (string $path): string => Storage::disk('public')->url($path))
            ->values()
            ->all();
    }

    public function getAllPhotoUrlsAttribute(): array
    {
        return collect([
            ...$this->uploaded_photo_urls,
            ...($this->photo_links ?? []),
        ])
            ->filter()
            ->values()
            ->all();
    }

    public function getPreviewImageUrlAttribute(): ?string
    {
        return $this->all_photo_urls[0] ?? null;
    }

    public static function filterPersistableAttributes(array $attributes): array
    {
        $persistableColumns = static::persistableColumns();

        if ($persistableColumns === []) {
            return Arr::only($attributes, ['customer_id', 'total', 'status']);
        }

        return Arr::only($attributes, $persistableColumns);
    }

    public static function persistableColumns(): array
    {
        if (static::$persistableColumnsCache !== null) {
            return static::$persistableColumnsCache;
        }

        if (! Schema::hasTable((new static())->getTable())) {
            return static::$persistableColumnsCache = [];
        }

        return static::$persistableColumnsCache = Schema::getColumnListing((new static())->getTable());
    }
}
