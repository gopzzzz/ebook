<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function home(){
        return view('web.index');
    }
    public function productlist(){
         return view('web.productlist');
    }
    public function product(){
          return view('web.product');
    }

}