<?php

namespace App\Http\Controllers;

use App\Enums\ItemType;
use App\Models\OrderItem;
use App\Services\OrderItemWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderItemController extends Controller
{
    public function __construct(
        protected OrderItemWorkflowService $workflow,
    ) {}

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
        $validated = $request->validate($this->rules());
        return $this->workflow->create($validated);
    }

    public function show(OrderItem $orderItem)
    {
        return $orderItem->load('order','item');
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate($this->rules());
        return $this->workflow->update($orderItem, $validated);
    }

    public function destroy(OrderItem $orderItem)
    {
        $this->workflow->delete($orderItem);

        return response()->noContent();
    }

    protected function rules(): array
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'item_type' => ['required', Rule::enum(ItemType::class)],
            'item_id' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'nullable|numeric|min:0',
            'meta' => 'nullable|array',
            'meta.variant' => 'nullable|string|max:255',
        ];
    }
}
