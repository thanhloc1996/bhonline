<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\type_products;
use App\products;
use App\Cart;
use Illuminate\Support\Facades\Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function ($view) {
            $loai_sp= type_products::all();
            // if (Session('cart')){
            //     $oldcart = Session::get('cart');
            //     $cart = new Cart($oldcart);
            // }
            $view->with('loai_sp',$loai_sp);
         });
        

         view()->composer(['header','page.checkout'], function ($view) {
                if (Session('cart')) {
                    $oldcart = Session::get('cart');
                    $cart = new Cart($oldcart);
                    $view->with([
                        'cart' => Session::get('cart'),
                        'product_cart' => $cart->items,
                        'totalPrice' => $cart->totalPrice,
                        'totalQty' => $cart->totalQty
                    ]); 

                }  
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

