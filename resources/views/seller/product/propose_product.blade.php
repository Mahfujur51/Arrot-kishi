@extends('layouts.seller-app')

@section('Propose-product','active')
@section('title',' Propose Porduct List')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            @if(!blank($propose_product))
            <div class="card">
                <div class="header bg-cyan text-center">

                    <h2 class="text-center">Your Pending Product</h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Seller Name</th>
                                <th>Product Image</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach($propose_product as $key=>$pproduct)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pproduct->product->product_name}}</td>
                                    <td>{{$pproduct->user->name}}</td>
                                    <td><img src="{{asset('products/'.$pproduct->product->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$pproduct->product->unit->name}}</td>
                                    <td>{{$pproduct->quantity}}</td>
                                    <td>{{$pproduct->price}}</td>
                                    <td>
                                        <span class="badge badge-danger">{{$pproduct->status}}</span>
                                    </td>
                                    <td>

                                        <a href="{{route('propose.product.delete',$pproduct->id)}}" id="delete" class="btn btn-danger"><i class="material-icons">delete</i></a>
                                        <a type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#editmodal-{{$pproduct->id}}"> <i class="material-icons">edit</i></a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$propose_product->links()}}
                    </div>

                </div>

            </div>
            @endif
            @if(!blank($process_product))
            <div class="card">
                <div class="header bg-orange text-center">

                    <h2 class="text-center">Your Processing Product</h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Seller Name</th>
                                <th>Product Image</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach($process_product as $key=>$pproduct)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pproduct->product->product_name}}</td>
                                    <td>{{$pproduct->user->name}}</td>
                                    <td><img src="{{asset('products/'.$pproduct->product->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$pproduct->product->unit->name}}</td>
                                    <td>{{$pproduct->quantity}}</td>
                                    <td>{{$pproduct->price}}</td>
                                    <td>
                                        <span class="badge badge-danger">{{$pproduct->status}}</span>
                                    </td>
                                    <td>


                                        <a href="{{route('seller.propose.product.accept',$pproduct->id)}}" id="accept" class="btn btn-primary"><i class="material-icons">done_all
                                            </i></a>
                                        <a type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editmodal-{{$pproduct->id}}"> <i class="material-icons">edit</i></a>
                                        <a href="{{route('seller.propose.product.reject',$pproduct->id)}}" id="delete" class="btn btn-danger"><i class="material-icons">delete</i></a>



                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$propose_product->links()}}
                    </div>

                </div>

            </div>
            @endif
            @if(!blank($accept_product))
            <div class="card">
                <div class="header bg-green text-center">

                    <h2 class="text-center">Your Accepted Product</h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Seller Name</th>
                                <th>Product Image</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach($accept_product as $key=>$pproduct)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pproduct->product->product_name}}</td>
                                    <td>{{$pproduct->user->name}}</td>
                                    <td><img src="{{asset('products/'.$pproduct->product->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$pproduct->product->unit->name}}</td>
                                    <td>{{$pproduct->quantity}}</td>
                                    <td>{{$pproduct->price}}</td>
                                    <td>
                                        <span class="badge badge-danger">{{$pproduct->status}}</span>
                                        
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$propose_product->links()}}
                    </div>

                </div>

            </div>
            @endif
            @if(!blank($reject_product))
            <div class="card">
                <div class="header bg-black text-center">

                    <h2 class="text-center">Your Rejected Product</h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Seller Name</th>
                                <th>Product Image</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach($reject_product as $key=>$pproduct)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pproduct->product->product_name}}</td>
                                    <td>{{$pproduct->user->name}}</td>
                                    <td><img src="{{asset('products/'.$pproduct->product->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$pproduct->product->unit->name}}</td>
                                    <td>{{$pproduct->quantity}}</td>
                                    <td>{{$pproduct->price}}</td>
                                    <td>
                                        <span class="badge badge-danger">{{$pproduct->status}}</span>
                                        
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$propose_product->links()}}
                    </div>

                </div>

            </div>
            @endif
        </div>
    @foreach($propose_product as $key=>$pproduct)
        <!-- Default Size -->
            <div class="modal fade" id="editmodal-{{$pproduct->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="defaultModalLabel">Update Propose Product</h4>
                        </div>
                        <form action="{{route('udpate.propose.prodcut',$pproduct->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{$pproduct->quantity}}" name="quantity" >
                                        <label class="form-label">Update Quantity</label>
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{$pproduct->price}}" name="price" >
                                        <label class="form-label">Update Price</label>
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Default Size -->
    @endforeach
    @foreach($process_product as $key=>$pproduct)
        <!-- Default Size -->
            <div class="modal fade" id="editmodal-{{$pproduct->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="defaultModalLabel">Update Propose Product</h4>
                        </div>
                        <form action="{{route('seller.udpate.propose.prodcut',$pproduct->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{$pproduct->quantity}}" name="quantity" >
                                        <label class="form-label">Update Quantity</label>
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{$pproduct->price}}" name="price" >
                                        <label class="form-label">Update Price</label>
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Default Size -->
        @endforeach
    </div>
@endsection
