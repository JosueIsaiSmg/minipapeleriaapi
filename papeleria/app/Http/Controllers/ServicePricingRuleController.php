<?php

namespace App\Http\Controllers;

use App\Models\ServicePricingRule;
use Illuminate\Http\Request;

class ServicePricingRuleController extends Controller
{
    public function index()
    {
        return ServicePricingRule::query()
            ->with('service')
            ->latest()
            ->get();
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam price float required The price associated with the pricing rule. Example: 50.00
     * @bodyParam min_quantity int The minimum quantity for the pricing rule. Example: 10
     * @bodyParam max_quantity int The maximum quantity for the pricing rule. Example: 100
     * @bodyParam variant string Variante opcional de la regla. Example: opalina
     */
    public function store(Request $request)
    {
        $validated = $this->normalize($request->validate($this->rules()));

        $servicePricingRule = ServicePricingRule::create($validated);
        return $servicePricingRule->load('service');
    }

    public function show(ServicePricingRule  $servicePricingRule)
    {
        return  $servicePricingRule->load('service');
    }

    /**
     * @bodyParam service_id int required The ID of the service. Example: 1
     * @bodyParam price float required The price associated with the pricing rule. Example: 50.00
     * @bodyParam min_quantity int The minimum quantity for the pricing rule. Example: 10
     * @bodyParam max_quantity int The maximum quantity for the pricing rule. Example: 100
     * @bodyParam variant string Variante opcional de la regla. Example: opalina
     */
    public function update(Request $request, ServicePricingRule $servicePricingRule)
    {
        $validated = $this->normalize($request->validate($this->rules()));
        $servicePricingRule->update($validated);
        return $servicePricingRule->load('service');
    }

    public function destroy(ServicePricingRule $servicePricingRule)
    {
        $servicePricingRule->delete();
        return response()->noContent();
    }

    protected function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',
            'variant' => 'nullable|string|max:255',
            'min_quantity' => 'nullable|integer|min:1',
            'max_quantity' => 'nullable|integer|gte:min_quantity',
            'price' => 'required|numeric|min:0',
        ];
    }

    protected function normalize(array $validated): array
    {
        if (array_key_exists('variant', $validated)) {
            $validated['variant'] = filled($validated['variant'])
                ? trim((string) $validated['variant'])
                : null;
        }

        return $validated;
    }
}
