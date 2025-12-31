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
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
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
     */
    public function update(Request $request, Bundle $bundle)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
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
