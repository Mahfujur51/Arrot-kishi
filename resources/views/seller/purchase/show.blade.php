@extends('layouts.seller-app')
@section('title', 'Purchase show')

@section('seller-purchase', 'active')

@section('content')

    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-cyan text-center">
                        <h2>
                            Purchase Details - {{ $purchase->showId }}

                        </h2>
                        <ul class="header-dropdown m-r--5 m-t--2">
                            <div class="display-flex">
                                {{-- <a href="{{ route('purchase.invoice', $purchase->id) }}" class="btn btn-grad1"><i class="material-icons">receipt</i>Invoice</a> --}}
                                <a href="{{ route('seller-purchase.index') }}" class="btn btn-grad"><i class="material-icons">visibility</i>View</a>
                            </div>
                        </ul>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <h3 class="text-center">Seller Information</h3>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $purchase->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $purchase->user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $purchase->user->email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <h3 class="text-center">Purchase Information</h3>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <tr>
                                            <td>Purchase Date</td>
                                            <td>{{ $purchase->showDate }}</td>
                                        </tr>

                                       
                                       
                                        <tr>
                                            <td>Total Products</td>
                                            <td><span class="badge badge-info">{{ $purchase->items->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                                <td>{{ number_format($purchase->amount, 2) }} </td>
                                        </tr>
                                       
                                       


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                   
                    <div class="header bg-orange text-center">
                        <h2>
                            Product Details - {{ $purchase->showId }}

                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>{{ __('SL') }}</th>
                                    <th>{{ __('Product Image') }}</th>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Unit') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Total') }}</th>
                                </tr>
                                </thead>
                                
                                    <tbody>
                                    @php
                                        $grand_total = 0;
                                    @endphp
                                    @forelse ($purchase->items as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td><img src="{{ asset('products/' . $item->product->image) }}"
                                                     width="60" height="60" alt=""></td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->product->unit->name }}</td>
                                            <td>{{ $item->purchase_qty }}</td>
                                            <td>
                                                {{ $item->purchase_qty }}
                                            </td>
                                            <td>{{ number_format($item->purchase_qty * $item->unite_price, 2) }}</td>
                                            @php
                                                $grand_total += $item->purchase_qty * $item->unite_price;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No data found!!</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="text-right"><strong>Grnad Total:</strong></td>
                                            <td>{{ number_format($grand_total,2) }}</td>
                                        </tr>
                                    </tfoot>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                            
                                    <div class="header bg-green text-center">
                            <h2>
                                Payment Details - {{ $order->showId }}

                            </h2>

                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Check Number') }}</th>
                                        <th>{{ __('Bank Name') }}</th>
                                        <th>{{ __('Check Photo') }}</th>
                                        <th>{{ __('Payment Date') }}</th>
                                        <th>{{ __('Pay amount') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($billings as $i => $bill)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $bill->check_number }}</td>
                                            <td>{{ $bill->bank_name }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#imgModal-{{ $bill->id }}"><img
                                                        src="{{ asset('images/check/' . $bill->check_photo) }}"
                                                        width="100px" height="50px" class="img-img" alt=""></a>
                                            </td>
                                            <td>{{ date('d-M-Y', strtotime($bill->created_at)) }}</td>
                                            <td>{{ number_format($bill->payment_amount, 2) }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data found!!</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- #END# Exportable Table -->
        </div>


@endsection
