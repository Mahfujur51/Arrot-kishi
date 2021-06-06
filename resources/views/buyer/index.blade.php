@extends('layouts.buyer-app')

@section('title','Buyer Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL ORDERS</div>
                    <div class="number count-to" data-from="0" data-to="{{$orders->count()}}" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL PURSCHES</div>
                    @php

                      $bill=App\Billing::distinct('bill_amount')->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');


                    @endphp
                    <div class="number count-to" data-from="0" data-to="{{$bill}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">child_friendly</i>
                </div>
                <div class="content">
                    <div class="text">Due</div>
                    @php
                         $total=App\Billing::distinct('bill_amount')->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                         $pay=App\Billing::where('buyer_id',Auth::user()->buyer_id)->sum('payment_amount');
                         $due=$total-$pay;
                    @endphp
                    <div class="number count-to" data-from="0" data-to="{{$due}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">

                    <div class="text">TOTAL STUFFS</div>
                    <div class="number count-to" data-from="0" data-to="{{$user}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>CPU USAGE (%)</h2>
                        </div>
                        <div class="col-xs-12 col-sm-6 align-right">
                            <div class="switch panel-switch-btn">
                                <span class="m-r-10 font-12">REAL TIME</span>
                                <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                            </div>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {!! $chart1->renderHtml() !!}
{{--                    <div id="real_time_chart" class="dashboard-flot-chart"></div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
    <div class="row clearfix">
        <!-- Visitors -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="body bg-pink">
{{--                    <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"--}}
{{--                         data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"--}}
{{--                         data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"--}}
{{--                         data-fill-Color="rgba(0, 188, 212, 0)">--}}
{{--                        @php--}}
{{--                            $date1=\Carbon\Carbon::today()->subDays(1);--}}
{{--                            $date7=\Carbon\Carbon::today()->subDays(7);--}}
{{--                            $date30=\Carbon\Carbon::today()->subDays(30);--}}


{{--                            $total_graph1=App\Billing::distinct('bill_amount')->where('created_at','>=',$date1)->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');--}}
{{--                            $total_graph2=App\Billing::distinct('bill_amount')->where('created_at','>=',$date7)->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');--}}
{{--                            $total_graph3=App\Billing::distinct('bill_amount')->where('created_at','>=',$date30)->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');--}}
{{--                        @endphp--}}
{{--                        {{$total_graph1}},{{$total_graph2}},{{$total_graph3}}--}}
{{--                    </div>--}}
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            @php
                                $date1=\Carbon\Carbon::today()->subDays(1);

                                $total_lastday=App\Billing::distinct('bill_amount')->where('created_at','>=',$date1)->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            @endphp

                            <span class="pull-right"><b>{{$total_lastday}}</b> <small>TAKA</small></span>
                        </li>
                        <li>
                            LAST 7 DAYS
                            @php

                                  $date7=\Carbon\Carbon::today()->subDays(7);

                                 $total_last7day=App\Billing::distinct('bill_amount')->where('created_at','>=',$date7)->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            @endphp
                            <span class="pull-right"><b>{{$total_last7day}}</b> <small>TAKA</small></span>
                        </li>
                        <li>
                            LAST 30 DAYS
                            @php


                              $date30=\Carbon\Carbon::today()->subDays(30);
                              $total_last30day=App\Billing::distinct('bill_amount')->where('created_at','>=',$date30)->where('order_id','!=','order_id')->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            @endphp
                            <span class="pull-right"><b>{{$total_last30day}}</b> <small>TAKA</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Visitors -->
        <!-- Latest Social Trends -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="body bg-cyan">
                    <div class="m-b--35 font-bold">PRODUCTS TRENDS</div>
                    <ul class="dashboard-stat-list">
                        @foreach($products as $product)
                        <li>
                            #{{$product->product_name}}
                            <span class="pull-right">
                                <i class="material-icons">trending_up</i>
                            </span>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Latest Social Trends -->

    </div>

    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>TASK INFOS</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Order Id</th>
                                    <th>Buyer Name</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders->latest()->limit(8)->get() as $i => $order)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $order->ShowId }}</td>

                                    <td>@if($order->user->parent->role == 'buyer') {{ $order->user->parent->name }}  @else  {{ $order->user->name }} @endif</td>
                                    <td><span class="label bg-green">{{$order->status}}</span></td>

                                    <td>
                                        @php
                                            $grant_total = 0;
                                        @endphp
                                        @foreach($order->items as $item)
                                            @php
                                                $grant_total +=$item->unite_price * $item->qty ;
                                            @endphp
                                        @endforeach
                                        {{ number_format($grant_total,2) }}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header bg-red">
                    <h2 class="text-center">Top Selleing Product</h2>

                </div>
                <div class="body">
                    <div id="donutchart" class="dashboard-donut-chart"></div>
                </div>
                <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            <?php  echo $chartData ?>
                        ]);
                        var options = {

                            is3D: true,
                        };



                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data,options);
                    }
                </script>
            </div>
        </div>
        <!-- #END# Browser Usage -->
    </div>
</div>
@endsection
@section('page-scripts')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
