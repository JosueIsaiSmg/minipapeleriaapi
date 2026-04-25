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
     * @bodyParam social_profile_url string Optional social profile URL. Example: https://instagram.com/juanperez
     * @bodyParam facebook_url string Optional Facebook URL. Example: https://facebook.com/juanperez
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'social_profile_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
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
     * @bodyParam social_profile_url string Optional social profile URL.
     * @bodyParam facebook_url string Optional Facebook URL.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'social_profile_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
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
