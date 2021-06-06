<?php

namespace App\Http\Controllers\Supplier;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class SupplierController extends Controller
{

    public function index(){
        $orders = Order::all();
        $users = User::all();
        $billings = Billing::all();
        $products=Product::latest()->limit(6)->get();
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
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'payment_amount',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);


        return view('supplier.index',$arr,compact('orders','users','billings','products','chart1'));
    }
}
