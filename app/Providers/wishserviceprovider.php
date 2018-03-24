<?php

namespace App\Providers;

use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class wishserviceprovider extends ServiceProvider
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

           $wish_count = '';

           if (Auth::user()) {

           $wish_count = Wishlist::where('user_id', Auth::user()->id)->count();
           
           }

           $view->with('wish_count',$wish_count);
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
