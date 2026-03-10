<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class IndexController extends Controller
{
    public function home(){
        $banner=DB::table('banners')->get();
        $dod=DB::table('offers')->where('type',1)
        ->leftJoin('items', 'offers.product_id', '=', 'items.id')
        ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
        ->select('offers.*','items.image','items.name','items.mrp','authors.author_name')
        ->limit(3)
        ->get();

        $fastmovingProducts=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
         ->limit(4)
         ->get();

        return view('web.index',compact('banner','dod','fastmovingProducts'));
    }
    public function productlist(){
         $category=DB::table('categories')->get();
          $items=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
        //  ->limit(4)
         ->get();
         return view('web.productlist',compact('category','items'));
    }
    public function product($slug){
          $product=DB::table('items')
          ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
          ->leftJoin('publishers', 'items.publisher_id', '=', 'publishers.id')
          ->where('slug',$slug)
           ->select('items.*','authors.author_name','publishers.publisher_name')
          ->first();
          return view('web.product',compact('product'));
    }

}