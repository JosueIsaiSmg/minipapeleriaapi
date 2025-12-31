<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePricingRuleController;
use App\Http\Controllers\ServiceConsumableController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\BundleItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Aquí defines todas las rutas de tu API RESTful.
| apiResource crea automáticamente las rutas index, store, show, update, destroy.
*/

Route::apiResource('products', ProductController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('service-pricing-rules', ServicePricingRuleController::class);
Route::apiResource('service-consumables', ServiceConsumableController::class);
Route::apiResource('bundles', BundleController::class);
Route::apiResource('bundle-items', BundleItemController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-items', OrderItemController::class);
