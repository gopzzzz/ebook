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
         ->where('items.status',0)
         ->limit(4)
         ->get();

          $newarrivals=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
         ->where('items.status',0)
          ->orderBy('id', 'desc')
         ->limit(4)
         ->get();

          $bestSellers = DB::table('items')
    ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
    ->leftJoin('order_trans', 'items.id', '=', 'order_trans.book_id')
    ->select(
        'items.*',
        'authors.author_name',
        DB::raw('COUNT(order_trans.book_id) as total_orders')
    )
    ->where('items.status', 0)
    ->groupBy(
        'items.id',
        'authors.author_name'
    )
    ->orderByDesc('total_orders')
    ->limit(4)
    ->get();

        $catlimit = DB::table('categories')
    // ->skip(5)
    // ->take(8)
    ->where('status',0)
    ->get();

      
         
    // echo "<pre>";print_r( $catlimit);exit;
          
         
         

        return view('web.index',compact('banner','dod','fastmovingProducts','newarrivals','bestSellers'));
    }

    public function newarrivals(){
            $category=DB::table('categories')
          ->leftJoin('items', 'categories.id', '=', 'items.cat_id')
          ->where('main_id',0)
        //   ->where('items.item_type',$id)
          ->where('categories.status',0)
          ->where('items.status',0)
          ->groupBy('categories.id')
          
          ->get();

          $items=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
         ->where('items.status',0)
        //  ->where('items.cat_id',$id)
         ->orderBy('items.id', 'desc')
         ->orderBy('id', 'desc')
        //  ->limit(4)
         ->get();

         
         return view('web.productlist',compact('category','items'));
    }

    public function bestsellors(){
           $category=DB::table('categories')
          ->leftJoin('items', 'categories.id', '=', 'items.cat_id')
          ->where('main_id',0)
        //   ->where('items.item_type',$id)
          ->where('categories.status',0)
          ->where('items.status',0)
          ->groupBy('categories.id')
          
          ->get();

          $items=DB::table('items')
    ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
    ->leftJoin('order_trans', 'items.id', '=', 'order_trans.book_id')
    ->select(
        'items.*',
        'authors.author_name',
        DB::raw('COUNT(order_trans.book_id) as total_orders')
    )
    ->where('items.status', 0)
    ->groupBy(
        'items.id',
        'authors.author_name'
    )
    ->orderByDesc('total_orders')
    // ->limit(4)
    ->get();

         
         return view('web.productlist',compact('category','items'));
    }

    public function gamingProducts($id) {
        $gamingItems=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->leftJoin('categories', 'items.cat_id', '=', 'categories.id')
         ->select('items.*','authors.author_name','categories.category_name')
         ->where('items.status',0)
         ->where('items.cat_id',$id)
         ->orderBy('items.id', 'desc')
         ->get();
          $banner=DB::table('banners')->first();
          $gamecategories=DB::table('categories')->where('main_id',1)->limit(6)->get();
          $gamecategorieslist=DB::table('categories')->where('main_id',1)->get();
        return view('web.gaming-products', compact('gamingItems','gamecategories','banner','gamecategorieslist'));
    }

    public function gamingProductDetail($slug) {
        $product=DB::table('items')
          ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
          ->leftJoin('publishers', 'items.publisher_id', '=', 'publishers.id')
          ->where('items.slug',$slug)
          ->select('items.*','authors.author_name','publishers.publisher_name')
          ->first();
          
        $fastmovingProducts=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
        
         ->limit(4)
         ->get();

         $gamecategories=DB::table('categories')->limit(6)->where('main_id',1)->get();
         $banner=DB::table('banners')->first();
          $gamecategorieslist=DB::table('categories')->where('main_id',1)->get();

        return view('web.gaming-product-detail', compact('product', 'fastmovingProducts','gamecategories','banner','gamecategorieslist'));
    }

    public function productlist($id){
          $category=DB::table('categories')
          ->leftJoin('items', 'categories.id', '=', 'items.cat_id')
          ->where('main_id',0)
          ->where('items.item_type',$id)
          ->where('categories.status',0)
          ->where('items.status',0)
          ->groupBy('categories.id')
          ->get();

          $items=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
         ->where('items.status',0)
         ->where('items.cat_id',$id)
         ->orderBy('items.id', 'desc')
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
          $varient_types=DB::table('available_atributes')
          ->leftJoin('varient_types', 'available_atributes.variant_id', '=', 'varient_types.id')
          ->where('product_id',$product->id)
          ->select('available_atributes.*','varient_types.varient_name')
          ->get();
           $fastmovingProducts=DB::table('items')
         ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
         ->select('items.*','authors.author_name')
         ->limit(4)
         ->get();

         

          return view('web.product',compact('product','fastmovingProducts','varient_types'));
    }

}