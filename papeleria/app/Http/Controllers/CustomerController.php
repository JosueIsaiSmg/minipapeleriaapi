<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::with('orders')->get();
    }

    /**
     * @bodyParam name string required The name of the customer. Example: Juan Perez
     * @bodyParam phone string The phone number of the customer. Example: +1234567890
     * @bodyParam email string The email address of the customer. Example: juanperez@mail.com
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $customer = Customer::create($validated);
        return $customer->load('orders');
    }

    public function show(Customer $customer)
    {
        return $customer->load('orders');
    }

    /**
     * @bodyParam name string required The name of the customer. Example: Juan Perez 2
     * @bodyParam phone string The phone number of the customer. Example: +1234567890
     * @bodyParam email string The email address of the customer. Example: juanperez2@mail.com
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);
        $customer->update($validated);
        return $customer->load('orders');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->noContent();
    }
}
