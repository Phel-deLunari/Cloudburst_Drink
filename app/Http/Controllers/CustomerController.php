<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:customers,phone',
            'address' => 'nullable',
        ]);

        Customer::create($request->only(['name', 'phone', 'address']));

        return redirect()->route('customers.index')->with('success', 'Thêm khách hàng thành công.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:customers,phone,' . $customer->id,
            'address' => 'nullable',
        ]);

        $customer->update($request->only(['name', 'phone', 'address']));

        return redirect()->route('customers.index')->with('success', 'Cập nhật khách hàng thành công.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Xóa khách hàng thành công.');
    }
}
