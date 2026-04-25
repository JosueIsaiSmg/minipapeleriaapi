<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bundle;
use App\Models\Product;
use App\Models\Service;

enum ItemType: string
{
    case Product = 'product';
    case Service = 'service';
    case Bundle = 'bundle';

    public function label(): string
    {
        return match ($this) {
            self::Product => 'Producto',
            self::Service => 'Servicio',
            self::Bundle => 'Bundle',
        };
    }

    public function options(): array
    {
        return match ($this) {
            self::Product => Product::query()->pluck('name', 'id')->toArray(),
            self::Service => Service::query()->pluck('name', 'id')->toArray(),
            self::Bundle => Bundle::query()->pluck('name', 'id')->toArray(),
        };
    }

    public function modelClass(): string
    {
        return match ($this) {
            self::Product => Product::class,
            self::Service => Service::class,
            self::Bundle => Bundle::class,
        };
    }

    public function findModelOrFail(int $id): Model
    {
        return $this->modelClass()::query()->findOrFail($id);
    }
}
