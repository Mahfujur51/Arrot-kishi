@extends('layouts.buyer-app')
@section('title','Create order')
@if(Auth::user()->role=='buyer')
@section('buyer_order','active')
@section('order','active')
@section('create-order','active')
@else
@section('order_create','active')
@endif
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan text-center">

                    <h2 class="text-center">Create order</h2>

                </div>
                <div class="body">
                        <div class="table-responsive">
                            <div class="row">
                                <form action="{{ route('orders.create') }}" method="GET">
                              
                                <div class="col-sm-3">
                                    <input type="search" name="s" value="{{ isset($s) ? $s : '' }}" class="form-control" placeholder="Search">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-grad float-left">Search</button>
                                </div>
                            </form>
                            </div>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Product Image') }}</th>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Unit') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        {{-- <th>{{ __('Total Price') }}</th> --}}
                                    </tr>
                                </thead>
                                <form action="{{ route('orders.store') }}" method="post">
                                    <tbody>
                                        @csrf
                                        @forelse ($products as $i => $product)
                                            <tr role="row" class="odd">
                                                <td>{{ $i + 1 }}</td>
                                                <td><img src="{{ asset('products/' . $product->image) }}"
                                                        width="60" height="60" alt=""></td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->unit->name }}</td>
                                                <td >{{ number_format($product->sales_rate,2) }}

                                                </td>
                                                <td>
                                                    <input type="hidden" name="products[]" value="{{ $product->id }}" id="">
                                                    <input type="hidden" min="0" name="prices[]"  value="{{ $product->sales_rate }}" id="price">
                                                    {{-- <input type="number" min="0" name="quantites[]" style="width: 80px" data-id="{{ $product->id }}" placeholder="00.00" id="qty"> --}}
                                                    <input type="number" min="0" name="quantites[]" style="width: 80px" data-id="{{ $product->id }}" placeholder="00.00" id="qty">


                                                </td>
                                                {{-- <td >
                                                    --
                                                </td> --}}

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No data found!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                    <tfoot>
                                        {{-- <tr>
                                            <td colspan="6" class="text-right"><strong>Grand Total:</strong></td>
                                            <td colspan="2">000</td>
                                        </tr> --}}
                                        <tr>
                                            <td colspan="7">

                                                <button class="btn button waves-effect custom-btn" type="submit"><i class="material-icons">library_add</i> Create Order</button>
                                            </td>
                                        </tr>
                                    </tfoot>

                            </form>

                            </table>
                        </div>
                        {{ $products->links() }}
                </div>

            </div>

        </div>
    </div>
    <script>
            function calculateAmount(val,price) {
                var tot_price = val * price;
                /*display the result*/
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price;
            }
        </script>
    @endsection

