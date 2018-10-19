<?php

namespace App\Providers;

use App\admin\Order;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class OrderserviceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {

          $order_count = '';

          $order_count = Order::where('status', 0)->count();

          $view->with('order_count',$order_count);
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
