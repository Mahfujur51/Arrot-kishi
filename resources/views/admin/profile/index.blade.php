@extends('layouts.admin-app')
@section('dashboard','active')
@section('page-styles')
<link href="{{ asset('backend/css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="contaimer-fluid">
    
        <div class="row gutters-sm">
            <div class="col-md-12">
              <div class="row gutters-sm">
            <div class="card card-user">
                <div class="header bg-red">
                    <h2>{{$user->name}} -  Profile Information</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-success"><i class="material-icons">edit</i> Edit Profile</a>

                    </ul>
                </div>
              <br>
                <div class="card-body cardbody">
                    <div class="col-md-3">
                
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-sm-12 text-secondary user-img">
                                <img src="{{asset('image_buyer/user/'.$user->image)}}" alt="Admin" class="rounded-circles" width="120">
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
