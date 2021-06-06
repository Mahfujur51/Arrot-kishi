<?php

namespace App\Http\Controllers\Buyer;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class BuyerController extends Controller
{

    public function index(){
        // if(auth()->user()->role == 'warehouse'){
        //     $orders = Order::where('buyer_id',auth()->user()->buyer_id)->latest()->get();
        // }

        // elseif(auth()->user()->role == 'accounts'){
        //     $orders = Order::where('buyer_id',auth()->user()->buyer_id)->where('status','received')->Orwhere('status','received')->latest()->get();

        // }
        // else{

        //     $orders = Order::where('buyer_id',auth()->user()->buyer_id)->latest()->get();
        // }
        $orders = Order::where('buyer_id',auth()->user()->buyer_id);
        $user = User::where('parent_id',auth()->user()->id)->count();
        $products=Product::latest()->limit(6)->get();
        $id=Auth::user()->id;
        $chart=Product::with('orders')->withCount(['orders'=>function($query){
            $query->orderBy('orders_count', 'asc');
        }])->take(5)->get();
        $chartData="";
        foreach ($chart as $list){
            $chartData.="['".$list->product_name."', ".$list->orders_count."],";
        }
        $arr['chartData']=rtrim($chartData,",");

        $chart_options = [
            'chart_title' => 'Payment Receive',
            'report_type' => 'group_by_date',
            'model' => 'App\Billing',
            'conditions' => [
                ['name' => 'Bills', 'condition' => 'user_id ='.$id, 'color' => '#00BCD4', 'fill' => true],
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'payment_amount',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('buyer.index',$arr,compact('user','orders','products','chart1'));
    }
}
