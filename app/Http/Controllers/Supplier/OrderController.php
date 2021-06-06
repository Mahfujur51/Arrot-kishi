<?php

namespace App\Http\Controllers\Supplier;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Notifications\OrderStatus;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ProductPrice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use PDF;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
        $status = null;
        if($request->has('status')){
            $status = $request->status;
            $orders = $query->latest()->filter($status)->paginate(10);
        }
        if($request->has('s')){
            $status = $request->s;
            $orders = $query->latest()->filter($status)->paginate(10);

        }else{

            $orders = $query->latest()->paginate(15);
        }
        return view('supplier.order.index',compact('orders','status'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $billings = Billing::where('order_id',$id)->get();
        return view('supplier.order.show',compact('order','billings'));
    }

    public function status(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = $request->status;
        $order->update(['status' => $status]);
        //send notification
        $user = User::find($order->user->id);
        Notification::send($user,new OrderStatus($order->id,$order->status));

        Session::flash('info','Order status updated successfully!!');
        return back();
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        return view('supplier.order.invoice',compact('order'));
    }

    public function orderProductUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'sales_date' => 'required'
        ]);
        // dd($request->all());
        $products = $request->input('products');
        $quantities = $request->input('quantites');
        $prices = $request->input('prices');
        
        foreach($quantities as $id => $qty){
            // $product = Product::findOrFail($products[$id]);
            $productPrice =new ProductPrice();
            $productPrice->product_id = $products[$id];
            $productPrice->sales_date = $request->sales_date;
            $productPrice->sales_rate = $prices[$id];
            $productPrice->save();
            

            $order_product = OrderProduct::where('order_id',$order->id)->where('product_id',$products[$id])->first();
            if($products[$id] && $qty > 0 ){
                $order_product->product_id = $products[$id];
                $order_product->order_id = $order->id;
                $order_product->qty = $qty;
                $order_product->unite_price = $prices[$id];
                $order_product->save();

            }
        }
        $order->status = 'accepted';
        $order->delivery_date = $request->sales_date;
        $order->save();
        //send notification
        $user = User::find($order->user->id);
        Notification::send($user,new OrderStatus($order->id,$order->status));
        
        Session::flash('info','Order product price updated!');
        return back();


        // $product = Product::findOrFail($id);
        // $productPrice =new ProductPrice();
        // $productPrice->sales_date = date('Y-m-d');
        // $productPrice->sales_rate = $request->sales_rate;
        // $product->productPrices()->save($productPrice);
        // return back();
    }

    public function generatePdf()
    {
        // $orders = Order::latest()->paginate(15);
        // $pdf = PDF::loadView('supplier.order.index',compact('orders'));
        // return $pdf->download('invoice.pdf');
    }
}
