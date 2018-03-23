<?php

namespace App\Providers;

use App\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            /** @var \Illuminate\Contracts\View\View $view */

            $cart_count = '';

            if (Auth::user()) {

            $cart_count = Cart::where('user_id', Auth::user()->id)->count();
            
            }

            $view->with('cart_count',$cart_count);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
