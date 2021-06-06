<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Purchase;
use App\PurchaseProduct;
use App\SellerPropose;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use App\Notifications\PurchaseNotification;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::latest()->paginate(15);
        return view('supplier.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = $request->user_id;
        $seller_id = $request->seller_id;
        $total_amount = $request->total_amount;
        $products = $request->product_id;
        $prices = $request->prices;
        $quantites = $request->quantites;
        
        //purchase
        $purchase = new Purchase();
        $purchase->purchase_id = IdGenerator::generate(['table' => 'purchases','field'=>'purchase_id', 'length' => 3, 'prefix' =>'000-']);
        $purchase->user_id = $user_id;
        $purchase->seller_id = $seller_id;
        $purchase->amount = $total_amount;
        $purchase->save();

        foreach($products as $id => $product){
            // echo $product."qty".$quantites[$id]."price".$prices[$id]."<br>";
            $purchase_product = new PurchaseProduct();
            $purchase_product->purchase_id = $purchase->id;
            $purchase_product->product_id = $product;
            $purchase_product->purchase_qty = $quantites[$id];
            $purchase_product->unite_price = $prices[$id];
            $purchase_product->save();
            //update seller propose product
            $propose_product = SellerPropose::where('seller_id',$user_id)->where('product_id',$product)->where('status','accept')->first();
            // $propose_product->status = 'sell';
            $propose_product->update(['status'=>'purchase']);
        }
        //send notification
        $user = User::find($user_id);
        Notification::send($user,new PurchaseNotification($purchase));
        
        Session::flash('success','Purchase has been successfully!');
        return redirect()->route('purchases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('supplier.purchase.show',compact('purchase'));
    }

    public function invoice($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('supplier.purchase.invoice',compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
