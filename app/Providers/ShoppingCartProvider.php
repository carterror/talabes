<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("*", function($view)
        {
            $shopping_cart_id = Session::get('shopping_cart_id');

            $shopping_cart = ShoppingCart::findOrCreateSessionID($shopping_cart_id);
        
            Session::put('shopping_cart_id', $shopping_cart->id );

            $view->with("shopping_cart", $shopping_cart);
        });
    }
}
