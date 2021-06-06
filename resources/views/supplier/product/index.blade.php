@extends('layouts.supplier-app')

@section('product', 'active')
@section('product-list', 'active')
@section('title', 'Product List')

@section('content')

    <div class="container-fluid">

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-cyan text-center">
                        <h2>
                            ALL PRODUCT

                        </h2>
                        <ul class="header-dropdown m-r--5 m-t--2">
                            <a href="{{ route('products.create') }}" class="btn btn-grad"><i class="material-icons">library_add</i> Create</a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Product ID') }}</th>
                                        <th>{{ __('Product Image') }}</th>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Unit') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        {{-- <th>{{ __('Purchase Rate') }}</th> --}}
                                        <th>{{ __('Today Price') }}</th>
                                        {{-- <th>{{ __('Previous Price') }}</th> --}}
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $i => $product)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $product->product_id }}</td>
                                            <td>
                                                <img height="80" src="{{ asset('products/'.$product->image) }}" alt="">
                                            </td>
                                            <td>{{ $product->product_name }}</td>

                                            <td>@if(isset($product->unit)){{ ucfirst($product->unit->name) }}@endif</td>

                                            <td>{{ ucfirst($product->product_type) }}</td>


                                            <td>{{ $product->sales_rate,2 }} </td>

                                            <td>
                                                <div class="icon-button-demo">
                                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-info waves-effect custom-btn1" >
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{ route('product.delete',$product->id) }}" id="delete" class="btn btn-sm btn-danger "> <i class="material-icons">delete_forever</i></a>
                                                    {{-- @if(auth()->user()->role != 'support')
                                                    <form action="{{ route('products.destroy',$product->id) }}" onsubmit="return confirm('Are you sure?')" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger waves-effect custom-btn1" >
                                                            <i class="material-icons">delete_forever</i>
                                                        </button>
                                                    </form>
                                                    @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="8">No Item Found!!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection


