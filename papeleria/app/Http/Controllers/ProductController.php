<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    /**
     * @bodyParam name string required The name of the product. Example: Lapiz #2
     * @bodyParam description string The description of the product.
     * @bodyParam price float required The price of the product. Example: 6
     * @bodyParam stock integer required The stock quantity of the product. Example: 14
     * @bodyParam category string The category of the product. Example: prod
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'nullable|string',
        ]);

        $product = Product::create($validated);
        return $product->load('bundleItems');
    }

    public function show(Product $product)
    {
        return $product->load('bundleItems');
    }

    /**
     * @bodyParam name string required The name of the product. Example: Lapiz #2
     * @bodyParam description string The description of the product.
     * @bodyParam price float required The price of the product. Example: 6
     * @bodyParam stock integer required The stock quantity of the product. Example: 14
     * @bodyParam category string The category of the product. Example: prod
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'nullable|string',
        ]);
        $product->update($validated);
        return $product->load('bundleItems');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}
