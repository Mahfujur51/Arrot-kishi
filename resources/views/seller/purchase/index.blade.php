@extends('layouts.seller-app')
@section('title', 'Sales')

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
                            ALL Purchase

                        </h2>
                        {{-- <ul class="header-dropdown m-r--5 m-t--2">
                            <a href="{{ route('orders.create') }}" class="btn btn-default">Create</a>

                        </ul> --}}
                    </div>
                    <div class="body">
                        {{-- <div class="row">
                            <form action="{{ route('order.index') }}" method="GET">
                            <div class="col-sm-3">
                                <div class="dataTables_length">
                                    <select name="status" class="form-control">
                                            <option value="">Select One</option>
                                            
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
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('Purchase ID') }}</th>
                                        {{-- <th>{{ __('Seller Name') }}</th> --}}
                                        {{-- <th>{{ __('Shipping Date') }}</th> --}}
                                        <th>{{ __('Purchase Date') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($purchases as  $purchase)
                                        <tr>
                                            <td>{{ $purchase->showId }}</td>

                                            {{-- <td>
                                               {{ $purchase->user->name }}
                                            </td> --}}
                                            <td>
                                               {{ $purchase->showDate }}
                                            </td>
                                           <td>{{ number_format($purchase->amount,2) }}</td>
                                            <td>
                                                <div class="icon-button-demo">

                                                    <a href="{{ route('seller.purchase.show', $purchase->id) }}"
                                                        class="btn btn-info waves-effect" title="Active">
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
                        {{ $purchases->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>




@endsection
