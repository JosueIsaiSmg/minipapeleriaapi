<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::with('order','item')->get();
    }

    /**
     * @bodyParam order_id int required The ID of the order. Example: 1
     * @bodyParam item_type string required The type of the item. Example: App\Models\Product
     * @bodyParam item_id int required The ID of the item. Example: 2
     * @bodyParam quantity int required The quantity of the item in the order. Example: 3
     * @bodyParam unit_price float required The unit price of the item. Example: 29.99
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_type' => 'required|string',
            'item_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($validated);
        return $orderItem->load('order','item');
    }

    public function show(OrderItem $orderItem)
    {
        return $orderItem->load('order','item');
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_type' => 'required|string',
            'item_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric',
        ]);
        $orderItem->update($validated);
        return  $orderItem->load('order','item');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return response()->noContent();
    }
}
