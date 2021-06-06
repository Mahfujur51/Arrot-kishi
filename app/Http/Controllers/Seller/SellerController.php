<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\SellerPropose;
use Illuminate\Http\Request;

class SellerController extends Controller
{
   
    public function index(){
        $products = SellerPropose::where('seller_id',auth()->user()->id);
        return view('seller.index',compact('products'));
    }
}
