<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::with('person');

        // Search by lastname if a search query is provided
        if ($request->has('search')) {
            $query->whereHas('person', function ($q) use ($request) {
                $q->where('lastname', 'like', '%' . $request->search . '%');
            });
        }

        $customers = $query->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Customer successfully added');
        return redirect()->route('admin.customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
        ]);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Customer successfully updated');
        return redirect()->route('admin.customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        session()->flash('success', 'Customer successfully deleted');
        return redirect()->route('admin.customers.index');
    }
}
