<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Item;
use DB;

class PageController extends Controller
{

public function aboutus(){
    return view('pages.aboutus');
}
public function search(Request $request)
{
    $query = $request->input('query'); // ✅ correct

    $customers = Item::where('name', 'LIKE', "%{$query}%")
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();

    $output = '';

    foreach ($customers as $customer) {
        $output .= '<div>' . $customer->name . '</div>';
    }

    return $output;
}
public function contactus(){
   $company=DB::table('profiles')->first();
   return view('pages.contactus',compact('company')); 
}
public function team(){
    $team=DB::table('publishers')->get();
    return view('pages.team',compact('team'));
}
public function privacy(){
    return view('pages.privacy');
}
public function termconditions(){
    return view('pages.term-conditions');
}
public function refund(){
    return view('pages.refund');
}

}
