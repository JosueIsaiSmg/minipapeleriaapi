<?php

namespace App\Http\Controllers;

use App\Models\ServiceConsumable;
use Illuminate\Http\Request;

class ServiceConsumableController extends Controller
{
    public function index()
    {
        return ServiceConsumable::query()
            ->with(['service', 'product', 'productVariant'])
            ->latest()
            ->get();
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam product_id int required The ID of the product. Example: 1
     * @bodyParam product_variant_id int Variante especifica del producto consumido. Example: 2
     * @bodyParam units_per_service int required The number of units of the product consumed per service. Example: 2
     * @bodyParam variant string La variante asociada al consumible. Example: opalina
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $serviceConsumable = ServiceConsumable::create($validated);
        return $serviceConsumable->load('service','product', 'productVariant');
    }

    public function show(ServiceConsumable $serviceConsumable)
    {
        return $serviceConsumable->load('service','product', 'productVariant');
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam product_id int required The ID of the product. Example: 1
     * @bodyParam product_variant_id int Variante especifica del producto consumido. Example: 2
     * @bodyParam units_per_service int required The number of units of the product consumed per service. Example: 2
     * @bodyParam variant string La variante asociada al consumible. Example: opalina
     */
    public function update(Request $request, ServiceConsumable $serviceConsumable)
    {
        $validated = $request->validate($this->rules());
        $serviceConsumable->update($validated);
        return $serviceConsumable->load(['service', 'product', 'productVariant']);
    }

    public function destroy(ServiceConsumable $serviceConsumable)
    {
        $serviceConsumable->delete();
        return response()->noContent();
    }

    protected function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',
            'product_id' => 'required|exists:products,id',
            'product_variant_id' => 'nullable|exists:variants,id',
            'units_per_service' => 'required|numeric|gt:0',
            'variant' => 'nullable|string|max:255',
        ];
    }
}
