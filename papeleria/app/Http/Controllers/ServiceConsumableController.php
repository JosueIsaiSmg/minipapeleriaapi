<?php

namespace App\Http\Controllers;

use App\Models\ServiceConsumable;
use Illuminate\Http\Request;

class ServiceConsumableController extends Controller
{
    public function index()
    {
        return ServiceConsumable::with('service','product')->get();
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam product_id int required The ID of the product. Example: 1
     * @bodyParam units_per_service int required The number of units of the product consumed per service. Example: 2
     * @bodyParam material string The material associated with the consumable. Example: glossy
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'product_id' => 'required|exists:products,id',
            'units_per_service' => 'required|integer|min:1',
            'material' => 'nullable|string',
        ]);

        $serviceConsumable = ServiceConsumable::create($validated);
        return $serviceConsumable->load('service','product');
    }

    public function show(ServiceConsumable $serviceConsumable)
    {
        return $serviceConsumable->load('service','product');
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam product_id int required The ID of the product. Example: 1
     * @bodyParam units_per_service int required The number of units of the product consumed per service. Example: 2
     * @bodyParam material string The material associated with the consumable. Example: glossy
     */
    public function update(Request $request, ServiceConsumable $serviceConsumable)
    {
        $validated = $request->validate([ 'service_id' => 'required|exists:services,id', 'product_id' => 'required|exists:products,id', 'units_per_service' => 'required|numeric|min:0', 'material' => 'nullable|string', ]);
        $serviceConsumable->update($validated);
        return $serviceConsumable->load(['service', 'product']);
    }

    public function destroy(ServiceConsumable $serviceConsumable)
    {
        $serviceConsumable->delete();
        return response()->noContent();
    }
}
