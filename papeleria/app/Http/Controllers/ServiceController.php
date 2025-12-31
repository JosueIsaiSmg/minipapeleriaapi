<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::with('pricingRules', 'consumables')->get();
    }

    /**
     * @bodyParam name string required The name of the service. Example: Impresion
     * @bodyParam description string The description of the service. Example: Servicio de impresion de documentos
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $service = Service::create($validated);
        return $service->load('pricingRules', 'consumables', 'bundleItems');
    }

    public function show(Service $service)
    {
        return $service->load('pricingRules', 'consumables', 'bundleItems');
    }

    /**
     * @bodyParam name string required The name of the service. Example: Impresion
     * @bodyParam description string The description of the service. Example: Servicio de impresion de documentos
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $service->update($validated);
        return $service->load('pricingRules', 'consumables', 'bundleItems');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->noContent();
    }
}
