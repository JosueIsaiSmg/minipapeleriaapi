<?php

namespace App\Http\Controllers;

use App\Models\ServicePricingRule;
use Illuminate\Http\Request;

class ServicePricingRuleController extends Controller
{
    public function index()
    {
        return ServicePricingRule::with('service')->get();
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam condition_type string required The type of condition for the pricing rule. Example: quantity
     * @bodyParam price float required The price associated with the pricing rule. Example: 50.00
     * @bodyParam min_quantity int The minimum quantity for the pricing rule. Example: 10
     * @bodyParam max_quantity int The maximum quantity for the pricing rule. Example: 100
     * @bodyParam material string The material associated with the pricing rule. Example: glossy
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'condition_type' => 'required|string',
            'price' => 'required|numeric',
            'min_quantity' => 'nullable|integer',
            'max_quantity' => 'nullable|integer',
            'material' => 'nullable|string',
        ]);

        $servicePricingRule = ServicePricingRule::create($validated);
        return $servicePricingRule->load('service');
    }

    public function show(ServicePricingRule  $servicePricingRule)
    {
        return  $servicePricingRule->load('service');
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam condition_type string required The type of condition for the pricing rule. Example: quantity
     * @bodyParam price float required The price associated with the pricing rule. Example: 50.00
     * @bodyParam min_quantity int The minimum quantity for the pricing rule. Example: 10
     * @bodyParam max_quantity int The maximum quantity for the pricing rule. Example: 100
     * @bodyParam material string The material associated with the pricing rule. Example: glossy
     */
    public function update(Request $request, ServicePricingRule $servicePricingRule)
    {
        $validated = $request->validate(['service_id' => 'required|exists:services,id', 'condition_type' => 'nullable|string', 'condition_value' => 'nullable|string', 'min_quantity' => 'nullable|integer|min:1', 'max_quantity' => 'nullable|integer', 'material' => 'nullable|string', 'size' => 'nullable|string', 'doc_type' => 'nullable|string', 'price' => 'required|numeric|min:0',]);
        $servicePricingRule->update($validated);
        return $servicePricingRule->load('service');
    }

    public function destroy(ServicePricingRule $servicePricingRule)
    {
        $servicePricingRule->delete();
        return response()->noContent();
    }
}
