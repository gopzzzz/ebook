<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Customer;

class CustomerController extends Controller
{
     public function index()
    {
        $customers = Customer::all();
        return view('admin.customer', compact('customers'));
    }

    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required|string|max:255',
    'phone_number' => 'required|string|max:20'
]);

        Customer::create([
    'name' => $request->name,
    'phone_number' => $request->phone_number
]);

        return redirect()->back()->with('success','Customer added successfully');
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
    'name' => 'required|string|max:255',
    'phone_number' => 'required|string|max:20'
]);
        $customer->update([
            'name'    => $request->name,
            'phone_number'   => $request->phone_number
            
        ]);

        return redirect()->back()->with('success','Customer updated successfully');
    }
}