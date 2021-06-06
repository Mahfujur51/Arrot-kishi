@extends('layouts.supplier-app')
@section('title', 'Orders')

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
                            ALL Order

                        </h2>
                        {{-- <ul class="header-dropdown m-r--5 m-t--2">
                            <a href="{{ route('orders.create') }}" class="btn btn-default">Create</a>

                        </ul> --}}
                    </div>
                    <div class="body">
                        <div class="row">
                            <form action="{{ route('order.index') }}" method="GET">
                            <div class="col-sm-3">
                                <div class="dataTables_length">
                                    <select name="status" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="pending">Pending</option>
                                            <option value="accepted">Accepted</option>
                                            <option value="processing">Processing</option>
                                            <option value="shipping">Shipping</option>
                                            <option value="received">Delivered</option>
                                            <option value="rejected">Rejected</option>
                                            <option value="completed">Completed</option>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <input type="search" name="s" value="{{ isset($status) ? $status : '' }}" class="form-control" placeholder="Search">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-outline-info float-left">Search</button>
                            </div>
                        </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Buyer Name') }}</th>
                                        <th>{{ __('Delivery Date') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $i => $order)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $order->ShowId }}</td>

                                            <td>
                                                @if ($order->user->parent->role == 'buyer')
                                                {{ $order->user->parent->name }} @else {{ $order->user->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($order->delivery_date))
                                                    {{ date('d-M-Y', strtotime($order->delivery_date)) }} @endif
                                            </td>
                                            <td><span class="label @if ($order->status ==
                                                'accepted') bg-primary @elseif($order->status ==
                                                'processing') bg-indigo @elseif($order->status ==
                                                'received') bg-light-green @elseif($order->status ==
                                                'rejected') bg-red @elseif($order->status ==
                                                'shipping') bg-amber @elseif($order->status ==
                                                'completed') bg-green @else bg-light-blue @endif">@if($order->status == 'received') Delivered @else {{ ucfirst($order->status) }} @endif</span>
                                            <td><span class="label @if ($order->payment_status ==
                                                'partials') bg-orange @elseif($order->payment_status ==
                                                'paid') bg-green @else bg-indigo @endif">{{ ucfirst($order->payment_status) }}</span>
                                            </td>
                                            <td>
                                                @php
                                                    $grant_total = 0;
                                                @endphp
                                                @foreach ($order->items as $item)
                                                    @php
                                                        $grant_total += $item->unite_price * $item->qty;
                                                    @endphp
                                                @endforeach
                                                {{ number_format($grant_total, 2) }}
                                            </td>
                                            <td>
                                                <div class="icon-button-demo">

                                                    <a href="{{ route('order.show', $order->id) }}"
                                                        class="btn btn-info waves-effect" title="Active"
                                                        style="float: left">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No data found!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            {{-- <a href="{{ route('order.index.pdf') }}" class="btn btn-info" style="float: right">PDF</a> --}}
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>




@endsection
