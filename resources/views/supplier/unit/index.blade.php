@extends('layouts.supplier-app')

@section('product', 'active')
@section('unit', 'active')
@section('title', 'Product List')

@section('content')

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-cyan text-center">
                        <h2>
                          Unit Name

                        </h2>
                        <ul class="header-dropdown m-r--5 m-t--2">
                            <button type="button" class="btn btn-grad waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add</i>Add Unit</button>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Unit Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($units as $key => $unit)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-success waves-effect " data-toggle="modal" data-target="#editmodal-{{$unit->id}}"><i class="material-icons">edit</i></a>
                                        <a href="{{route('supplier.unit.delete',$unit->id)}}" id="delete" class="btn btn-danger @yield('buyer-profile')"> <i class="material-icons">delete_forever</i></a>
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
        <!-- #END# Exportable Table -->


        <!-- Default Size -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <h4 class="modal-title" id="defaultModalLabel">Add Unit</h4>
                    </div>
                    <form action="{{route('supplier.unit.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" >
                                    <label class="form-label">Please Enter Unit Name</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn button waves-effect">Create Unit</button>
                        <button type="button" class="btn button_u waves-effect" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Default Size -->
        @foreach($units as $key=>$unit)
        <!-- Default Size -->
        <div class="modal fade" id="editmodal-{{$unit->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <h4 class="modal-title" id="defaultModalLabel">Update Unit</h4>
                    </div>
                    <form action="{{route('supplier.unit.update',$unit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $unit->name }}" name="name" >
                                    <label class="form-label">Please Enter Unit Name</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn button waves-effect">Update Unit</button>
                            <button type="button" class="btn button_u waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Default Size -->
            @endforeach


    </div>
@endsection


