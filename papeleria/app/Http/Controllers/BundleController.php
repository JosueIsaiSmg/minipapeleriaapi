<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index()
    {
        return Bundle::with('items.item')->get();
    }

    /**
     * @bodyParam name string required The name of the bundle. Example: Dia del Padre
     * @bodyParam description string The description of the bundle. Example: Paquete especial para el Dia del Padre
     * @bodyParam stock integer Stock disponible del bundle. Example: 5
     * @bodyParam price float Precio de venta del bundle. Example: 120
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'nullable|numeric|min:0',
        ]);

        // Crear el bundle
        $bundle = Bundle::create($validated);
        return $bundle->load('items.item');
    }

    public function show(Bundle $bundle)
    {
        return $bundle->load('items.item');
    }

    /**
     * @bodyParam name string required The name of the bundle. Example: Dia de la Madre
     * @bodyParam description string The description of the bundle. Example: Paquete especial para el Dia de la Madre
     * @bodyParam stock integer Stock disponible del bundle. Example: 5
     * @bodyParam price float Precio de venta del bundle. Example: 120
     */
    public function update(Request $request, Bundle $bundle)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'nullable|numeric|min:0',
        ]);

        $bundle->update($validated);
        return $bundle->load('items.item');
    }


    public function destroy(Bundle $bundle)
    {
        $bundle->delete();
        return response()->noContent();
    }
}
