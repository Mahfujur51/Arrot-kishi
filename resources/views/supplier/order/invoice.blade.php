@extends('layouts.supplier-app')
@section('title', 'Order invoice')
@section('supplier-order', 'active')

@section('page-styles')
{{--    <!-- Bootstrap CSS -->--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">--}}


    <style>
        .card{
            padding: 30px !important;

        }
        .color{

            color:red;
            font-weight: 500;
        }

        hr{
            background-color: red;
            height: 2px;
        }
        .thead-darks{
            background-color: red !important;
            color: white;
        }
        .address1{
            font-weight: 600;
        }
        .details{
            font-weight: 600;
        }

        table, th, td {
            border: 1.5px solid gray;
        }


        /*
     * Misc: print
     * -----------
     */
        @media print {

            .no-print,
            .main-sidebar,
            .left-side,
            .main-header,
            .content-header {
                display: none !important;
            }
            .custom{
            background: red;
            color: #fff;
        }
        .custom-text{
            color:red;
        }

            .content-wrapper,
            .right-side,
            .main-footer {
                margin-left: 0 !important;
                min-height: 0 !important;
                -webkit-transform: translate(0, 0) !important;
                -ms-transform: translate(0, 0) !important;
                -o-transform: translate(0, 0) !important;
                transform: translate(0, 0) !important;
            }

            .fixed .content-wrapper,
            .fixed .right-side {
                padding-top: 0 !important;
            }

            .invoice {
                width: 100%;
                border: 0;
                margin: 0;
                padding: 0;
            }

            .invoice-col {
                float: left;
                width: 33.3333333%;
            }

            .table-responsive {
                overflow: auto;
            }

            .table-responsive>.table tr th,
            .table-responsive>.table tr td {
                white-space: normal !important;
            }
        }

    </style>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="" style="margin-bottom: 30px">
                                <section>
                                    <div class="pull-left">
                                        <img style="margin-bottom: 10px" src="{{asset('arrot.png')}}" alt="Admin"  width="120">

                                        <address>
                                            <strong>Attor-Krishi-Ponno.</strong><br>
                                            1259 (4th Floor), Road 10, Mirpur DOHS<br>
                                            Dhaka 1216<br>
                                            Phone: +880-1947179930<br>
                                            Email: support@selevenit.com
                                        </address>
                                    </div>
                                    <div class="pull-right">
                                        <p>
                                            <img  src="{{asset('image_buyer/user/'.$order->user->image)}}" alt="Admin"  width="100" height="100px !important">
                                        </p>
                                        <address>
                                            <strong>{{ $order->user->name }}</strong><br>
                                            {{$order->user->buyer->buyer_address}}<br>
                                            Phone: {{$order->user->phone}}<br>
                                            Email: {{$order->user->email}}
                                        </address>
                                    </div>

                                </section>


                            </div>

                            <div class="clearfix">

                            </div>
                            <hr class="jony">
                            <div class="details">
                                <section>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="color">Bill To</p>
                                            <address>
                                                {{ $order->user->name }}<br>
                                                {{$order->user->buyer->buyer_address}}
                                            </address>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="color">Ship To</p>
                                            <address>
                                                {{ $order->user->name }}<br>
                                                {{$order->user->buyer->buyer_address}}
                                            </address>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="color">Invoice Date <span style="color:black; margin-left: 40px">{{ date('d/m/Y') }}</span></p>
                                            <p style="color:red">P.O.# <span style="margin-left: 85px;color: black">{{ $order->delivery_date }}</span></p>
                                            <p style="color:red; margin-top:-10px">Order Number : <span style=" margin-left:45px;color: black">{{ $order->showId }}</span></p>
                                        </div>
                                    </div>

                                </section>
                            </div>
                            <br>
                            <div class="">
                                <section>
                                    <table class="table">
                                        <thead class="thead-darks">
                                        <tr class="text-center">
                                            <th scope="col">Qty</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $sub_total = 0;
                                        @endphp
                                        @forelse ($order->items as $i => $item)
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td>{{ $item->product->product_name }}</td>

                                            <td>{{ number_format($item->unite_price, 2) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->delivered_qty * $item->unite_price, 2) }}</td>
                                        @php
                                            $sub_total += $item->delivered_qty * $item->unite_price;
                                        @endphp
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No product found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </section>
                            </div>

                            <div class="" style="color: black; font-weight: 600">
                                <section>
                                    <div></div>
                                    <div class="pull-right">
                                        <p>SubTotal <span style="margin-left: 100px">{{ number_format($sub_total, 2) }}</span></p>
                                        <p>Sales Tax 5% <span style="margin-left: 80px">0.00 Tk</span></p>
                                        <p> <strong>Total</strong><samp style="margin-left: 125px"><strong>{{ number_format($sub_total, 2) }}</strong></samp></p>
                                    </div>
                                </section>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <br>

                            <div class="row">
                                <div class="pull-right">
                                    <a href="" target="_blank" onclick="myPrint()" class="btn button no-print pull-right"><i class="material-icons">local_printshop</i> Print</a>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <address class="address1">
                                            <span style="color:red; font-size: 18px ; margin-bottom: 10px !important">Terms and Conditions</span>  <br><br>

                                            Payment is due within 15 days<br>

                                            Name of Bank<br>

                                            Account Number<br>

                                            Routing
                                        </address>
                                    </div>
                                    <div class="col-md-4">
                                        <address class="address1"> <span style="color: red; font-size: 18px ;">Pepared By </span> <br><br>
                                            Md. Jony Islam <br>
                                            Date: 5-12-2021</address>
                                    </div>
                                    <div class="col-md-4">
                                        <address class="address1"> <span style="color: red; font-size: 18px ;">Authorized By </span> <br><br>
                                            Attor-Krishi-Ponno. <br>
                                            Date: 5-12-2021<br>
                                            Signature:
                                        </address>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>


    <script>
        function myPrint() {
            window.print();
        }

    </script>
@endsection

@section('page-scripts')



@endsection
