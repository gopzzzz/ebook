<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Item;
use App\Models\ShippingAddress;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
  public function boot()
{
    Paginator::useBootstrap();
    View::composer('*', function ($view) {

        
  $cartItems = [];
  $cusAddress = [];
  $profile = [];
  $orderPending = [];
        $cartCount = 0;
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->count();
               $cartItems = Cart::where('user_id', Auth::id())
                 ->leftJoin('items', 'carts.product_id', '=', 'items.id')
                  ->leftJoin('authors', 'items.author_id', '=', 'authors.id')
                 ->select('carts.*','items.name','items.image','items.mrp','items.sr','authors.author_name')
                ->get();

                $cusAddress=ShippingAddress::where('shipping_address.cus_id', Auth::id())
                 ->leftJoin('customers', 'shipping_address.cus_id', '=', 'customers.id')
                 ->select('shipping_address.*','customers.ship_id')
                ->get();

                $profile=DB::table('customers')->where('user_id',Auth::id())->first();
                $orderPending=DB::table('order_masters')->where('status',0)->count();
               

        }else{
      $guestCart = session('guest_cart', []);

      if($guestCart==null){
        $cartCount =0 ;
      }else{
       $cartCount = count($guestCart);
        }

      



    //   dd($cartCount);exit;

$productIds = collect($guestCart)->pluck('product_id')->toArray();



$cartItems = Item::whereIn('id', $productIds)
    ->select('id as product_id', 'name', 'image', 'mrp', 'sr')
    ->get()
    ->map(function ($item) use ($guestCart) {

        $cart = collect($guestCart)
            ->firstWhere('product_id', $item->product_id);

        $item->qty = $cart['qty'] ?? 1;
         $item->size = $cart['size'] ?? '';

        return $item;
    });


        }

        //  echo "<pre>";print_r($cartItems);exit;
       
      
        $app_profile=DB::table('profiles')->first();
        $categorylist=DB::table('categories')->where('status',0)->get();
        $cartProductIds = collect($cartItems)->pluck('product_id')->toArray();

        $view->with(compact('cartItems','cartCount','cusAddress','profile','app_profile','cartProductIds','categorylist','orderPending'));
    });
}
}
