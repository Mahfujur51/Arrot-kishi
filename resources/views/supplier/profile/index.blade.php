@extends('layouts.supplier-app')
@section('dashboard','active')
@section('page-styles')
<link href="{{ asset('backend/css/profile.css') }}" rel="stylesheet">
<style>
    .custom-padding{
        padding-bottom: 50px;
    }
</style>
@endsection
@section('content')

<div class="contaimer-fluid">
    
        <div class="row gutters-sm">
            <div class="col-md-12 ">
              <div class="row gutters-sm">
            <div class="card card-user ">
                <div class="header bg-cyan">
                    <h2>{{$user->name}} -  Profile Information</h2>
                    <ul class="header-dropdown m-r--5 m-t--2">
                        <a href="{{ route('supplier.profile.edit',auth()->user()->id) }}" class="btn btn-grad"><i class="material-icons">edit</i>Edit Profile</a>

                    </ul>
                    {{-- <ul class="header-dropdown m-r--5">
                        <a href="{{ route('supplier.profile.edit') }}" class="btn btn-default"><i class="material-icons">edit</i>Edit</a>
                    </ul> --}}
                </div>
              <br>
                <div class="card-body cardbody custom-padding">
                    <div class="col-md-3">
                
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-sm-12 text-secondary user-img">
                                <img src="{{asset('users/'.$user->image)}}" alt="Supplier" class="rounded-circles" width="120">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-sm-12 ">
                                 <h5 class="mb-0"><span>Name:</span>  {{$user->name}}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                 <h5 class="mb-0"><span>Enail:</span> {{$user->email}}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                 <h5 class="mb-0"><span>Phone:</span> {{$user->phone}}</h5>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-2">
                    </div>


                </div>
            </div>
        </div>


          </div>

    </div>
@endsection
