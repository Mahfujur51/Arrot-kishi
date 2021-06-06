<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Supplier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
//        role 1==admin
        if (Auth::user()->role=='admin'){
            return redirect()->route('admin.index');

        }
//        role 2==buyer
        if (Auth::user()->role=='buyer'){
            return redirect()->route('buyer.index');
        }
        //        role 3==seller
        if (Auth::user()->role=='seller'){
            return redirect()->route('seller.index');
        }

        //        role 4==supplier
        if (Auth::user()->role=='supplier' || auth()->user()->role == 'support'){
            return $next($request);

        }

         //        role 4==supplier
        if (Auth::user()->role=='supplier'){
            return $next($request);

        }
    }
}
