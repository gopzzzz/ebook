<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
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
        $cartCount = 0;
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->count();
               $cartItems = Cart::where('user_id', Auth::id())
                 ->leftJoin('items', 'carts.product_id', '=', 'items.id')
                 ->select('carts.*','items.name','items.image','items.mrp','items.sr')
                ->get();

                $cusAddress=ShippingAddress::where('shipping_address.cus_id', Auth::id())
                 ->leftJoin('customers', 'shipping_address.cus_id', '=', 'customers.id')
                 ->select('shipping_address.*','customers.ship_id')
                ->get();

                $profile=DB::table('customers')->where('user_id',Auth::id())->first();

        }
        $app_profile=DB::table('profiles')->first();
        $cartProductIds = collect($cartItems)->pluck('product_id')->toArray();

        $view->with(compact('cartItems','cartCount','cusAddress','profile','app_profile','cartProductIds'));
    });
}
}
