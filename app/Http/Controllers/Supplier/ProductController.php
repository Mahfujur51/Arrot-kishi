<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductPrice;
use App\SellerPropose;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Notifications\SellerProduct;
use App\Notifications\SellerProductStatus;
use App\User;
use Image;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('supplier.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        if(blank($units)) return redirect()->route('unit.index')->with(session()->flash('info','Please add one uint first.'));
        return view('supplier.product.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
         $data = $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'purchase_rate' => 'sometimes|nullable|numeric',
            'sales_rate' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            'unit_id' => 'required|numeric',
            'product_type' => 'required|string',
        ]);

        if($request->product_type == 'vegetable'){
            $product_id = IdGenerator::generate(['table' => 'products','field'=>'product_id', 'length' => 7, 'prefix' =>'VEG-']);

        }elseif($request->product_type == 'fish'){
            $product_id = IdGenerator::generate(['table' => 'products','field'=>'product_id', 'length' => 7, 'prefix' =>'FIS-']);

        }else{
            $product_id = IdGenerator::generate(['table' => 'products','field'=>'product_id', 'length' => 7, 'prefix' =>'MET-']);

        }
        $product = new Product();
        $product->product_id = $product_id;
        $product->product_name = $data['product_name'];
        $product->product_description = $data['description'];
        $product->unit_id = $data['unit_id'];
        $product->product_type = $data['product_type'];
        if($request->has('image')){
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('products/'.$name_gen);
            $product->image = $name_gen;
        }
        $product->save();

        $product_price =new ProductPrice();
        // $product_price->purchase_rate = $data['purchase_rate'];
        $product_price->sales_rate = $data['sales_rate'];
        $product->productPrices()->save($product_price);

        Session::flash('success','Product created successfully!!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $units = Unit::all();
        return view('supplier.product.edit',compact('product','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  dd($request->all());
        $data = $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'purchase_rate' => 'sometimes|nullable|numeric',
            'sales_rate' => 'required|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'unit_id' => 'required|numeric',
            'product_type' => 'required|string',
        ]);



        if($request->product_type == 'vegetable'){
            $product_id = Helper::IDGenerator(new Product,'product_id',4,'VEG');
        }elseif($request->product_type == 'fish'){
            $product_id = Helper::IDGenerator(new Product,'product_id',4,'FIS');
        }else{
            $product_id = Helper::IDGenerator(new Product,'product_id',4,'MET');
        }
        $product = Product::findOrFail($id);
        $product->product_id = $product_id;
        $product->product_name = $data['product_name'];
        $product->product_description = $data['description'];
        $product->unit_id = $data['unit_id'];
        $product->product_type = $data['product_type'];
        $path = 'products/'.$product->image;
        if($request->has('image')){
            // if(file_exists(public_path($path))){
            //     unlink($path);
            // }
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('products/'.$name_gen);
            $product->image = $name_gen;
        }
        $product->save();

        $product_price =new ProductPrice();
        $product_price->sales_rate = $data['sales_rate'];
        $product_price->updated_date = date('Y-m-d');
        $product->productPrices()->save($product_price);

        Session::flash('success'.'Product updated successfully!!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($product->id);
        // $product = Product::findOrFail($id);
        // $product->productPrices()->delete();
        // $path = 'products/'.$product->image;
        // if(file_exists(public_path($path))){
        //     unlink($path);
        // }
        // $product->delete();
        // Session::flash('success'.'Product deleted successfully!!');
        // return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        // $product->productPrices()->delete();
        $path = 'products/'.$product->image;
        if(file_exists(public_path($path))){
            unlink($path);
        }
        $product->delete();
        Session::flash('warning'.'Product deleted successfully!!');
        return redirect()->back();
    }
    public  function  propose_product(Request $request){
        $sellers = User::where('role','seller')->get();
        // $seller = User::findOrFail($request->seller_id);
        // if($request->has('seller_id')){
        //     $seller = $request->seller_id;
        //     $sellers = $query->filter($seller)->get();
        // }else{

        //     $sellers = $query->get();
        // }


        $propose_product=SellerPropose::Where('status','pending')->paginate(15);
        $process_product=SellerPropose::Where('status','processing')->paginate(15);
        $seller_id = null;
        if($request->has('seller_id')){
            $seller_id = $request->seller_id;
            $accept_product=SellerPropose::Where('status','accept')->where('seller_id',$seller_id)->paginate(15);
        }else{

            $accept_product=SellerPropose::Where('status','accept')->paginate(15);
        }
        return view('supplier.product.propose_product',compact('propose_product','accept_product','process_product','sellers','seller_id'));
    }
    public  function  propose_accept($id){
        $product=SellerPropose::findOrFail($id);
        // dd($product);
       $product->status='accept';
       $product->update();

       $user = User::where('id',$product->seller_id)->first();
       Notification::send($user,new SellerProductStatus($product));

       Session::flash('info'.'Product Accepted successfully!!');
       return redirect()->back();

    }
    public function  propose_reject($id){
        $product=SellerPropose::findOrFail($id);
        $product->status='reject';
        $product->update();

        $user = User::where('id',$product->seller_id)->first();
        Notification::send($user,new SellerProductStatus($product));

        Session::flash('success'.'Product Accepted successfully!!');
        return redirect()->back();
    }
    public  function  propose_update(Request  $request,$id){
        $product=SellerPropose::findOrFail($id);
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->status='processing';
        $product->update();

        $user = User::where('id',$product->seller_id)->first();
        Notification::send($user,new SellerProductStatus($product));

        Session::flash('success'.'Product Accepted successfully!!');
        return redirect()->back();

    }
}
