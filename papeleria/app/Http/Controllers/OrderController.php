<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Services\OrderWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\ItemType;

class OrderController extends Controller
{
    public function __construct(
        protected OrderWorkflowService $workflow,
    ) {}

    /**
     * @group Orders
     *
     * List orders
     *
     * Returns all orders with customer and item relationships loaded.
     */
    public function index()
    {
        return Order::query()
            ->with('customer', 'items.item')
            ->latest()
            ->get();
    }

    /**
     * @group Orders
     *
     * Create order
     *
     * Creates an order and optionally creates nested order items. If an item is a service,
     * its price is resolved from pricing rules and product stock is discounted from related consumables.
     *
     * @bodyParam customer_id int required The ID of the customer placing the order. Example: 1
     * @bodyParam status string El estado de la orden. Valores permitidos: pending, confirmed, in_progress, completed, cancelled. Example: pending
     * @bodyParam total float The total amount of the order. Example: 150.75
     * @bodyParam description string Descripcion opcional de la orden. Example: 100 impresiones en opalina.
     * @bodyParam photo_paths array Rutas opcionales de fotos subidas. Example: ["orders/photos/ref-1.jpg"]
     * @bodyParam photo_links array URLs opcionales de fotos. Example: ["https://example.com/ref-1.jpg"]
     * @bodyParam order_items array Conceptos opcionales para crear junto con la orden.
     * @bodyParam order_items[].item_type string required cuando envias conceptos. Valores permitidos: product, service, bundle. Example: service
     * @bodyParam order_items[].item_id int required cuando envias conceptos. Example: 1
     * @bodyParam order_items[].quantity int required cuando envias conceptos. Example: 100
     * @bodyParam order_items[].meta.variant string Variante opcional del servicio. Example: opalina
     *
     * @response 200 scenario="Order created" {
     *   "id": 1,
     *   "customer_id": 1,
     *   "total": 1000,
     *   "status": "pending"
     * }
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        return $this->workflow->create($validated);
    }

    /**
     * @group Orders
     *
     * Show order
     *
     * Returns a single order with customer and items.
     */
    public function show(Order $order)
    {
        return $order->load('customer','items.item');
    }

    /**
     * @group Orders
     *
     * Update order
     *
     * Updates order attributes. If `order_items` is sent, existing order items are replaced and stock is recalculated.
     *
     * @bodyParam customer_id int required The ID of the customer placing the order. Example: 1
     * @bodyParam status string El estado de la orden. Valores permitidos: pending, confirmed, in_progress, completed, cancelled. Example: pending
     * @bodyParam total float The total amount of the order. Example: 150.75
     * @bodyParam description string Optional order description.
     * @bodyParam order_items array Optional full replacement of order items.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate($this->rules());
        return $this->workflow->update($order, $validated);
    }

    /**
     * @group Orders
     *
     * Delete order
     *
     * Deletes an order.
     */
    public function destroy(Order $order)
    {
        $this->workflow->delete($order);
        return response()->noContent();
    }

    protected function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'total' => 'nullable|numeric|min:0',
            'status' => ['nullable', Rule::enum(OrderStatus::class)],
            'description' => 'nullable|string',
            'photo_paths' => 'nullable|array',
            'photo_paths.*' => 'string|max:2048',
            'photo_links' => 'nullable|array',
            'photo_links.*' => 'nullable|url|max:2048',
            'order_items' => 'nullable|array',
            'order_items.*.item_type' => ['required_with:order_items', Rule::enum(ItemType::class)],
            'order_items.*.item_id' => 'required_with:order_items|integer|min:1',
            'order_items.*.quantity' => 'required_with:order_items|integer|min:1',
            'order_items.*.meta' => 'nullable|array',
            'order_items.*.meta.variant' => 'nullable|string|max:255',
        ];
    }
}
