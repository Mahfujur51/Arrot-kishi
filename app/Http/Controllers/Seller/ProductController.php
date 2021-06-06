<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Seller;
use App\Notifications\SellerProduct;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\SellerPropose;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index(){
        $products=Product::all();
        return view('seller.product.index',compact('products'));
    }

    public  function create(Request  $request){

        $products = $request->products;
        $quantities = $request->quantites;
        $prices = $request->prices;
        foreach($products as $key => $product)
        {
            $sellerpro=new SellerPropose();
            if($products[$key] && $product > 0){
                $sellerpro->product_id=$product;
                $sellerpro->price=$prices[$key];
                $sellerpro->quantity=$quantities[$key];
                $sellerpro->seller_id=Auth::user()->id;
                $sellerpro->status='pending';
                if(!$prices[$key] == NULL && !$quantities[$key] == NULL) {
                    $sellerpro->save();
                    Session::flash('info','Your Product has been submitted!');
                    
                }
                else{
                    Session::flash('warning','Something went wrong!');
                    return  redirect()->back();
                }

            }

        }
        $user = User::find(auth()->user()->id);
        $supplier = User::where('role','supplier')->get();
        Notification::send($supplier,new SellerProduct($user));
        return redirect()->route('seller.propose.product');



    }

    public  function propose_product(){
        $propose_product=SellerPropose::where('seller_id',Auth::user()->id)->Where('status','pending')->paginate(15);
        $process_product=SellerPropose::where('seller_id',Auth::user()->id)->Where('status','processing')->paginate(15);
        $accept_product=SellerPropose::where('seller_id',Auth::user()->id)->Where('status','accept')->paginate(15);
        $reject_product=SellerPropose::where('seller_id',Auth::user()->id)->Where('status','reject')->paginate(15);

        return view('seller.product.propose_product',compact('propose_product','process_product','accept_product','reject_product'));
    }
    public  function  update(Request  $request,$id){
        $request->validate([
           'quantity'=>'required',
           'price'=>'required'
        ]);
        $product=SellerPropose::findOrFail($id);
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->status='pending';
        $product->update();
        Session::flash('success','Your Product has been submitted!');
        return redirect()->route('seller.propose.product');

    }

    public  function  pproduct_delete($id){
       $product=SellerPropose::findOrFail($id);
       $product->delete();
        Session::flash('success','Your Product has been Deleted!');
        return redirect()->back();
    }
    public  function  propose_accept($id){
        $product=SellerPropose::findOrFail($id);
        $product->status='accept';
        $product->update();
        Session::flash('success'.'Product Accepted successfully!!');
        return redirect()->back();

    }
    public  function  propose_update(Request  $request,$id){
        $product=SellerPropose::findOrFail($id);
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->status='processing';
        $product->update();
        Session::flash('success'.'Product Accepted successfully!!');
        return redirect()->back();

    }
    public function  propose_reject($id){
        $product=SellerPropose::findOrFail($id);
        $product->status='reject';
        $product->update();
        Session::flash('success'.'Product Rejected successfully!!');
        return redirect()->back();
    }


}
