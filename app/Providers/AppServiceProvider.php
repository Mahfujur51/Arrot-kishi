<?php

namespace App\Providers;

use App\Order;
use App\User;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // view()->composer(['includes.buyer.navbar','includes.supplier.navbar'],function($view){
        //     $today = now();
        //     $users = User::where('parent_id',auth()->user()->id)->whereDate('created_at',$today);
        //     $query = Order::whereDate('created_at',$today);
        //     $orders = Order::whereDate('created_at',$today);
        //     $supplierUsers = User::where('parent_id',auth()->user()->id);
        //     $buyerOrders = $query->where('user_id',auth()->user()->id);
        //     $count = $buyerOrders->count() + $users->count();
        //     $view->with([
        //         'users'=>$users,
        //         'buyerOrders'=>$buyerOrders,
        //         'count'=>$count,
        //         'orders' => $orders,
        //         'supplierUsers' => $supplierUsers
        //         ]);
        // });
    }
}
