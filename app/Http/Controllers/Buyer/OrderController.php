<?php

namespace App\Http\Controllers\Buyer;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Notifications\NewOrder;
use App\Notifications\OrderStatus;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        if(auth()->user()->role == 'warehouse'){
            $orders = Order::where('buyer_id',auth()->user()->buyer_id)->latest()->paginate(15);
        }

        elseif(auth()->user()->role == 'accounts'){
            $orders = Order::where('buyer_id',auth()->user()->buyer_id)->where('status','received')->latest()->paginate(15);

        }
        else{

            $orders = Order::where('buyer_id',auth()->user()->buyer_id)->orWhere('user_id',auth()->user()->id)->latest()->paginate(15);
        }
        return view('buyer.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $query = Product::query();
        $s = null;
        if($request->has('s')){
            $s = $request->s;
            $products = $query->latest()->search($s)->paginate(20);
        }else{

            $products = $query->latest()->paginate(20);
        }
        return view('buyer.order.create',compact('products','s'));
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

        $products = $request->input('products');
        $quantities = $request->input('quantites');
        $prices = $request->input('prices');

        //insert data in orders table
        if ( !empty(array_filter($quantities))){
            $order = Order::create(
                [
                    'user_id' => auth()->user()->id,
                    'buyer_id' => auth()->user()->buyer_id,
                ]
            );
        }
        else{
            Session::flash('warning','Please add atleast one quantites!!');
            return redirect()->back();

        }
        // $order->delivery_date = $order->created_at->addDays(3);
        // $order->save();

        //insert data in order_product table
        $amount = 0;
        foreach($quantities as $id => $qty){
            if($products[$id] && $qty > 0){
                // echo $products[$id]." qty". $qty."<br>";
                // OrderProduct::create([
                //     'product_id' => $products[$id],
                //     'order_id' => $order->id,
                //     'qty' => $qty
                // ]);

               $orderProduct = new OrderProduct();
               $orderProduct->product_id = $products[$id];
               $orderProduct->order_id = $order->id;
               $orderProduct->qty = $qty;
               $orderProduct->unite_price = $prices[$id];
               $orderProduct->save();

            }

        }
        $users = User::where('role','supplier')->get();
        Notification::send($users, new NewOrder($order,$order->id));
        
        Session::flash('success','Order created successfully!!');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $billings = Billing::where('order_id',$order->id)->get();
        return view('buyer.order.show',compact('order','billings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('buyer.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if($request->has('delivery_date') || $request->has('amount')){
            $order->update($request->all());
        }
        $products = $request->input('products');
        $quantities = $request->input('quantites');
        $prices = $request->input('prices');
        foreach($quantities as $id => $qty){
            $order_product = OrderProduct::where('order_id',$order->id)->where('product_id',$products[$id])->first();

            if($products[$id] && $qty > 0 ){

                $order_product->product_id = $products[$id];
                $order_product->order_id = $order->id;
                $order_product->qty = $qty;
                $order_product->unite_price = $prices[$id];
                $order_product->save();

            }
        }
        Session::flash('info','Order has been updated successfully!!');
        return redirect()->route('orders.index');
    }

    public function received(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $products = $request->input('products');
        $quantities = $request->input('quantites');
        foreach($quantities as $id => $qty){
            $order_product = OrderProduct::where('order_id',$order->id)->where('product_id',$products[$id])->first();

            if($products[$id] && $qty > 0 ){

                $order_product->product_id = $products[$id];
                $order_product->order_id = $order->id;
                $order_product->delivered_qty = $qty;
                $order_product->save();

            }
        }
        $order->status = 'received';
        $order->save();
        //notification
        $user = User::where('role','supplier')->get();
        Notification::send($user,new OrderStatus($order->id,$order->status));

        Session::flash('info','Order has been updated successfully!!');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
