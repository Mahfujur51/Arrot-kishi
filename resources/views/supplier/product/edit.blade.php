@extends('layouts.supplier-app')

@section('product', 'active')
@section('title', 'Edit product')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan text-center">

                    <h2>Edit Product</h2>
                    <ul class="header-dropdown m-r--5 m-t--2">
                        <a href="{{ route('products.index') }}" class="btn btn-grad"><i class="material-icons">visibility</i>View</a>
                    </ul>

                </div>
                <form id="form_validation" action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                            name="product_name" value="{{ old('product_name',$product->product_name) }}" required>
                                        {{-- <label class="form-label">Product Name</label> --}}
                                       
                                    </div>
                                    @error('paroduct_name')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize"
                                            required>{{ old('description',$product->product_description) }}</textarea>

                                    </div>
                                    @error('description')
                                     <span class="validation-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Unit</label><br>
                                    @foreach ($units as $unit)
                                    <input type="radio" name="unit_id" @if($unit->id == $product->unit_id) checked @endif value="{{ $unit->id }}" id="unit_id{{ $unit->id }}" class="with-gap">
                                    <label for="unit_id{{ $unit->id }}">{{ ucfirst($unit->name) }}</label>
                                    @endforeach
                                    <br>
                                    @error('unit_id')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>


                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="">
                                        <label class="form-label">Product Photo</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image">
                                        <img width="55" src="{{ asset('products/'.$product->image) }}" alt="">

                                    </div>
                                    @error('image')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line ">
                                        <label class="form-label">Sales Rate</label>
                                        <input type="number" class="form-control @error('sales_rate') is-invalid @enderror"
                                            name="sales_rate" value="{{ old('sales_rate',$product->sales_rate) }}" required>
                                        @error('sales_rate')
                                        <span class="validation-message">{{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Type</label><br>
                                    <input type="radio" name="product_type" value="vegetable" id="Vegetable" class="with-gap" {{ $product->product_type == 'vegetable'?'checked':'' }} >
                                    <label for="Vegetable">Vegetable</label>

                                    <input type="radio" name="product_type"  value="fish" id="Fish" class="with-gap"{{ $product->product_type == 'fish'?'checked':'' }}>
                                    <label for="Fish" class="m-l-20">Fish</label>

                                    <input type="radio" name="product_type" value="meat" id="meat" class="with-gap" {{ $product->product_type == 'meat'?'checked':'' }}>
                                    <label for="meat" class="m-l-20">Meat</label><br>
                                    @error('product_type')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>

                            </div>
                            <button class="btn button waves-effect custom-btn" type="submit"><i class="material-icons">update</i> Update Product</button>
                        </div>
                       
                 </form>
            </div>

        </div>

    </div>
@endsection


@section('page-scripts')

@endsection
