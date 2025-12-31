<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('customer','items.item')->get();
    }

    /**
     * @bodyParam customer_id int required The ID of the customer placing the order. Example: 1
     * @bodyParam status string The status of the order. Example: pending
     * @bodyParam total float The total amount of the order. Example: 150.75
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total' => 'nullable|numeric',
            'status' => 'nullable|string',
        ]);

        $order = Order::create($validated);
        return $order->load('customer','items.item');
    }

    public function show(Order $order)
    {
        return $order->load('customer','items.item');
    }

    /**
     * @bodyParam customer_id int required The ID of the customer placing the order. Example: 1
     * @bodyParam status string The status of the order. Example: pending
     * @bodyParam total float The total amount of the order. Example: 150.75
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total' => 'nullable|numeric',
            'status' => 'nullable|string',
        ]);
        $order->update($validated);
        return $order->load('customer','items.item');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent();
    }
}
