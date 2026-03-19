<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


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
    Paginator::useBootstrapFive();
    View::composer('*', function ($view) {

        
  $cartItems = [];
        $cartCount = 0;
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->count();
               $cartItems = Cart::where('user_id', Auth::id())
                 ->leftJoin('items', 'carts.product_id', '=', 'items.id')
                 ->select('carts.*','items.name','items.image','items.mrp','items.sr')
                ->get();

        }

        $view->with(compact('cartItems','cartCount'));
    });
}
}
