<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::where('user_id',auth()->user()->id)->latest()->paginate(15);
        return view('seller.purchase.index',compact('purchases'));
    }

    public function show($id)
    {
        $purchase = Purchase::findOrfail($id);
        return view('seller.purchase.show',compact('purchase'));
    }
}
