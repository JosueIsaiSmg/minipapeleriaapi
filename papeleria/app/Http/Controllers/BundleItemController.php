<?php
namespace App\Http\Controllers;

use App\Models\BundleItem;
use Illuminate\Http\Request;

class BundleItemController extends Controller
{
    public function index()
    {
        return BundleItem::with('bundle','item')->get();
    }

    /**
     * @bodyParam bundle_id int required The ID of the bundle. Example: 1
     * @bodyParam item_type string required The type of the item. Example: App\Models\Product
     * @bodyParam item_id int required The ID of the item. Example: 2
     * @bodyParam quantity int required The quantity of the item in the bundle. Example: 3
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bundle_id' => 'required|exists:bundles,id',
            'item_type' => 'required|string',
            'item_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $bundleItem = BundleItem::create($validated);
        return $bundleItem->load('bundle','item');
    }

    public function show(BundleItem $bundleItem)
    {
        return $bundleItem->load('bundle','item');
    }
    /**
     * @bodyParam bundle_id int required The ID of the bundle. Example: 1
     * @bodyParam item_type string required The type of the item. Example: App\Models\Product
     * @bodyParam item_id int required The ID of the item. Example: 2
     * @bodyParam quantity int required The quantity of the item in the bundle. Example: 3
     */
    public function update(Request $request, BundleItem $bundleItem)
    {
        $validated = $request->validate([
            'bundle_id' => 'required|exists:bundles,id',
            'item_type' => 'required|string',
            'item_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        $bundleItem->update($validated);
        return $bundleItem->load('bundle','item');
    }

    public function destroy(BundleItem $bundleItem)
    {
        $bundleItem->delete();
        return response()->noContent();
    }
}
