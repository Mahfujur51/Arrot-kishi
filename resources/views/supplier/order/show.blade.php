@extends('layouts.supplier-app')
@section('title', 'Order show')

@section('supplier-order', 'active')

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
                            Order Details - {{ $order->showId }}

                        </h2>
                        <ul class="header-dropdown m-r--5 m-t--2">
                            <div class="display-flex">
                                <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-grad1"><i class="material-icons">receipt</i>Invoice</a>
                                <a href="{{ route('order.index') }}" class="btn btn-grad"><i class="material-icons">visibility</i>View</a>
                            </div>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center">Buyer Information</h3>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $order->user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $order->user->email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">Order Information</h3>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <tr>
                                            <td>Delivery Date</td>
                                            <td>@if(isset($order->delivery_date)) {{ date('d-M-Y', strtotime($order->delivery_date)) }} @endif</td>
                                        </tr>

                                        <tr>
                                            <td>Order Status</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn @if ($order->status == 'completed') btn-success
                                                @elseif($order->status == 'rejected') btn-danger @else
                                                        btn-default @endif">@if ($order->status == 'received') Delivered @else
                                                            {{ ucfirst($order->status) }} @endif
                                                    </button>
                                                    @if ($order->status !== 'rejected' && $order->status !== 'completed')
                                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                            <span class="caret"></span>
                                                            {{-- <span class="sr-only">Toggle Dropdown</span> --}}
                                                        </button>
                                                    @endif
                                                    <ul class="dropdown-menu" role="menu">
                                                        @if ($order->status !== 'accepted' && $order->status !== 'shipping' && $order->status !== 'received' && $order->status !== 'processing' && $order->status !== 'rejected' && $order->status !== 'completed')
                                                            <li><a>
                                                                    <form
                                                                        action="{{ route('supplier.order.status', $order->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="status" value="accepted">
                                                                        <button type="submit"
                                                                                style="background: none;border:none">Accepted</button>
                                                                    </form>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($order->status !== 'processing' && $order->status !== 'shipping' && $order->status !== 'received' && $order->status !== 'rejected' && $order->status !== 'completed')
                                                            <li><a>
                                                                    <form
                                                                        action="{{ route('supplier.order.status', $order->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="status"
                                                                               value="processing">
                                                                        <button type="submit"
                                                                                style="background: none;border:none">Processing</button>
                                                                    </form>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($order->status !== 'shipping' && $order->status !== 'received' && $order->status !== 'rejected' && $order->status !== 'completed')
                                                            <li><a>
                                                                    <form
                                                                        action="{{ route('supplier.order.status', $order->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="status" value="shipping">
                                                                        <button type="submit"
                                                                                style="background: none;border:none">Shipping</button>
                                                                    </form>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($order->status !== 'rejected' && $order->status !== 'received' && $order->status !== 'completed')
                                                            <li><a href="">
                                                                    <form
                                                                        action="{{ route('supplier.order.status', $order->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="status" value="rejected">
                                                                        <button type="submit"
                                                                                style="background: none;border:none">Rejected</button>
                                                                    </form>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($order->status !== 'completed' && $order->status !== 'rejected')
                                                            <li><a href="">
                                                                    <form
                                                                        action="{{ route('supplier.order.status', $order->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="status"
                                                                               value="completed">
                                                                        <button type="submit"
                                                                                style="background: none;border:none">Completed</button>
                                                                    </form>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td><span
                                                    class="badge badge-soft-info">{{ ucfirst($order->payment_status) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Products</td>
                                            <td><span class="badge badge-info">{{ $order->items->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            {{-- <td>{{ number_format($order->amount, 2) }}</td> --}}
                                            @php
                                                $grant_total = 0;
                                            @endphp
                                            @forelse ($order->items as $item)
                                                @php
                                                    $grant_total += $item->unite_price * $item->qty;
                                                @endphp
                                                @endforeach
                                                <td>{{ number_format($grant_total, 2) }} </td>
                                        </tr>
                                        <tr>
                                            <td>Payable Amount</td>
                                            <td>
                                                @php
                                                    $payable = 0;
                                                @endphp
                                                @forelse ($order->items as $item)
                                                    @php
                                                        $payable += $item->unite_price * $item->delivered_qty;
                                                    @endphp
                                                    @endforeach
                                                    {{ number_format($payable, 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Due Amount</td>
                                            @php
                                                $due_amount = $payable - $billings->sum('payment_amount');
                                            @endphp
                                            <td>{{ number_format($due_amount, 2) }}</td>
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
                            Product Details - {{ $order->showId }}

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
                                <form action="{{ route('order.product.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <tbody>
                                    @php
                                        $grand_total = 0;
                                    @endphp
                                    @forelse ($order->items as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td><img src="{{ asset('products/' . $item->product->image) }}"
                                                     width="60" height="60" alt=""></td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->product->unit->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>

                                                <input type="number" name="prices[]" class="input-field-width"
                                                       value="{{ number_format($item->unite_price, 2) }}" id="">
                                                <input type="hidden" name="products[]" class="input-field-width"
                                                       value="{{ $item->product->id }}" id="">
                                                <input type="hidden" name="quantites[]" class="input-field-width"
                                                       value="{{ $item->qty }}" id="">
                                                {{-- <input type="hidden" name="prices[]" class="input-field-width"  id=""> --}}

                                                {{-- <button class="btn btn-sm btn-info reload-btn"><i class="material-icons">refresh</i></button> --}}

                                            </td>
                                            <td>{{ number_format($item->qty * $item->unite_price, 2) }}</td>
                                            @php
                                                $grand_total += $item->qty * $item->unite_price;
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
                                        @if ($order->status == 'pending')
                                            <td>
                                                <input type="date" name="sales_date"
                                                       class="@error('sales_date') is-invalid @enderror"><br>
                                                @error('sales_date')
                                                <span class="validation-message">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td colspan="2">
                                                <button class="btn btn-success"><i class="material-icons">done_all</i>Accept</button>

                                                <button type="submit" onclick="event.preventDefault();
                                                document.getElementById('submitForm').submit();" class="btn btn-danger"><i class="material-icons">close</i>Reject</button>
                                            </td>
                                        @endif
                                        <td colspan="@if ($order->status != 'pending') 6 @else 3 @endif" class="text-right"><strong>Grand
                                                Total:</strong></td>
                                        <td colspan="2">{{ number_format($grand_total, 2) }}</td>
                                    </tr>
                                    </tfoot>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card card-card">
                        
                            
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
                                    {{-- <tfoot>
                                            <tr>

                                                <td colspan="6" class="text-right"><strong>Grand Total:</strong></td>
                                                <td colspan="2">{{ number_format($grand_total,2) }}</td>
                                            </tr>
                                        </tfoot> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <h4 class="modal-title" id="defaultModalLabel">Make Payment</h4>
                    </div>
                    <form action="{{ route('buyer.order.payment') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{ $order->id }}" name="order_id" id="">
                            <input type="hidden" value="{{ $order->amount }}" name="bill_amount" id="">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="">
                            <input type="hidden" value="{{ auth()->user()->buyer_id }}" name="buyer_id" id="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" disabled min="0"
                                                   class="form-control @error('bill_amount') is-invalid @enderror"
                                                   value="{{ old('bill_amount', $order->amount) }}" name="bill_amount">
                                            <label class="form-label">Bill amount</label>
                                            @error('bill_amount')
                                            <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" min="0"
                                                   class="form-control @error('payment_amount') is-invalid @enderror"
                                                   value="{{ old('payment_amount') }}" name="payment_amount">
                                            <label class="form-label">Payment amount</label>
                                            @error('payment_amount')
                                            <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" min="0"
                                                   class="form-control @error('check_number') is-invalid @enderror"
                                                   value="{{ old('check_number') }}" name="check_number">
                                            <label class="form-label">Check number</label>
                                            @error('check_number')
                                            <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control @error('bank_name') is-invalid @enderror"
                                                   value="{{ old('bank_name') }}" name="bank_name">
                                            <label class="form-label">Bank name</label>
                                            @error('bank_name')
                                            <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <label class="form-label">Due date</label>
                                            <input type="date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}" name="due_date" >
                                            @error('due_date')
                                            <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <label class="form-label">Check issue date</label>
                                            <input type="date"
                                                   class="form-control @error('check_issue_date') is-invalid @enderror"
                                                   value="{{ old('check_issue_date') }}" name="check_issue_date">
                                            @error('check_issue_date')
                                            <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <label class="form-label">Check photo</label>
                                            <input type="file" class="form-control @error('check_photo') is-invalid @enderror"
                                                   value="{{ old('check_photo') }}" name="check_photo">
                                            @error('check_photo')
                                            <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <label for="">Payment Type</label><br>
                                            <input type="radio" checked name="payment_type" value="check" id="check"
                                                   class="with-gap">
                                            <label for="check">Check</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect">SUBMIT</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($billings as $i => $bill)
            <div class="modal fade" id="imgModal-{{ $bill->id }}">

                <p class=" waves-effect img-btn" data-dismiss="modal"><span class="material-icons text-danger">
                cancel
            </span></p>
                <div class="text-center"><img src="{{ asset('images/check/' . $bill->check_photo) }}" alt="" width="70%"
                                              class="img-img" height="500px"></div>
            </div>
        @endforeach



        <form id="submitForm" action="{{ route('supplier.order.status', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="rejected">
        </form>
@endsection
