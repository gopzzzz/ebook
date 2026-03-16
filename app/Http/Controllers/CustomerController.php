<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Customer;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
     public function index(Request $request)
{
    $search = $request->search;

    $customers = Customer::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10);
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
    public function login(){
        return view('web.login');
    }
    public function user_registration(){
        return view('web.register');
    }
    public function uregister(Request $request){
    try {

    DB::beginTransaction();

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->cpassword);
    $user->role = 2;
    $user->save();

    $customer = new Customer;
    $customer->user_id = $user->id;
    $customer->name = $request->name;
    $customer->save();

    DB::commit();

    return redirect('login')->with('success','User registered successfully');

} catch (QueryException $e) {

    DB::rollBack();

    $errorCode = $e->errorInfo[1];

    switch ($errorCode) {

        case 1062:
            $message = "User already registered";
            break;

        case 1452:
            $message = "Invalid reference. Related record not found.";
            break;

        case 1048:
            $message = "Required field is missing.";
            break;

        case 1364:
            $message = "Some required fields were not provided.";
            break;

        default:
            $message = "Database error occurred. Please try again.";
    }

    return back()->with('error', $message);
}
    }
    public function signin(Request $request){
   $credentials = [
        'email' => $request->email,
        'password' => $request->password,
        'role' => 2
    ];

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->route('index');
              
    }

    return back()->with('error','Invalid email or password');
    }
}