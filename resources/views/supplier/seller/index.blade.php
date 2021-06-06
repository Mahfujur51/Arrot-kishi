@extends('layouts.supplier-app')

@section('seller','active')
@section('all-seller','active')
@section('content')
    <div class="container-fluid" xmlns="">

        <!-- Widgets -->

        <div class="body">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan ">
                            <h2>
                                All Seller List

                            </h2>
                            <ul class="header-dropdown m-r--5 m-t--2">
                                <a href="{{ route('supplier.seller.create') }}" class="btn btn-grad"><i class="material-icons">library_add</i>Create</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <td>{{$user->seller_id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td><img src="{{asset('image_seller/user/'.$user->image)}}" alt="" height="75px" width="75px"></td>
                                            <td>{{$user->phone}}</td>

                                            <td>
                                             <div class="icon-button-demo">
                                                <a href="{{ route('supplier.seller.edit',$user->id) }}" class="btn btn-success"> <i class="material-icons">edit</i></a>
                                                <a href="{{ route('supplier.seller.profile',$user->id) }}" class="btn btn-primary @yield('buyer-profile')"> <i class="material-icons">visibility</i></a>
                                                @if(auth()->user()->role != 'support')
                                                <a href="{{ route('supplier.seller.delete',$user->id) }}" id="delete" class="btn btn-danger @yield('buyer-profile')"> <i class="material-icons">delete_forever</i></a>
                                                 @endif
                                                 
                                                  
                                                   
                                                </div>
                                                    
                                            
                                            </td>
                                        </tr>
                                    @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        @endsection



