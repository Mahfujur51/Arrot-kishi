@extends('layouts.buyer-app')
@section('profile','active')
@section('page-styles')
<link href="{{ asset('backend/css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')

@if(Auth::user()->role=='buyer')
        <div class="container-fluid">
            <!-- Basic Example -->
                   <div class="row gutters-sm">
            <div class="card">
              <div class="header bg-cyan">
              <h2 class="text-center">
                Buyer Information
              </h2>
              <ul class="header-dropdown m-r--5 m-t--2">
                            <a href="{{ route('profile.edit') }}" class="btn btn-grad"><i class="material-icons">edit</i> Edit Profile</a>

                        </ul>
              </div>
              <br>
                <div class="card-body cardbody">
                <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-5">
                      <h5 class="mb-0"></h5>
                    </div>
                    <div class="col-sm-6 text-secondary ">
                      <img src="{{asset('image_buyer/user/'.$user->image)}}" alt="Admin" class="rounded-circle" width="120">
                    </div>
                    </div>
                </div>
            <div class="col-md-4">
              <div class="row">
                    <div class="col-sm-12 ">
                      <h5 class="mb-0"><span>Name:</span> {{$buyer->buyer_name}}</h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Email:</span> {{$buyer->buyer_email}}</h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Phone:</span> {{$buyer->buyer_telephone}}</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Address:</span> {{$buyer->buyer_address}}</h5>
                    </div>
                  </div>


            </div>
            <div class="col-md-4">
                    <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0 "><span>Tagline:</span> {{$buyer->tagline}}</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Website:</span> {{$buyer->buyer_website}}</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Buyer Type:</span> {{$buyer->buyer_type}}</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Buyer Id:</span> {{$buyer->buyer_id}}</h5>
                    </div>
                  </div>
            </div>

          </div>
          </div>


          <div class="row gutters-sm">


              <div class="col-md-6 ">
              <div class="card">
              <div class="header bg-red">
              <h2 class="text-center">Trade Licence</h2>
              </div>
              <br>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0 profilen"></h6>
                    </div>
                    <div class="col-sm-6 text-secondary trade">
                     <img src="{{asset('image_buyer/user/'.$buyer->trade_license)}}" alt="Admin" class="img-thumbnail" >
                    </div>
                  </div>
                  <hr>
                  <div class="row cardbody1">
                    <div class="col-sm-6 ">
                      <h6 class="mb-0">Trade Licence Exp-Date</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                       {{$buyer->expire_date}}
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-6 ">
              <div class="row gutters-sm">
            <div class="card card-sr">
              <div class="header bg-red">
              <h2 class="text-center">
                Buyer Representive
              </h2>
              </div>
              <br>
          <div class="card-body cardbody">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12 text-secondary ">
                      <img src="{{asset('image_buyer/user/'.$buyer->br_image)}}" alt="Admin" class="rounded-circles" width="120">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-12 ">
                      <h5 class="mb-0"><span>Name:</span>  {{$buyer->br_name}}</h5>
                </div>
                </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Phone:</span> {{$buyer->br_phone}}</h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Email:</span> {{$buyer->br_email}}</h5>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0 "><span>NID:</span> {{$buyer->buyer_nid}}</h5>
                    </div>
                  </div>


            </div>

          </div>
          </div>
            </div>


          </div>

        </div>

    <!-- #END# Colored Card - With Loading -->
    @else


    <div class="contaimer-fluid">
    
        <div class="row gutters-sm">
            <div class="col-md-12">
              <div class="row gutters-sm">
            <div class="card card-user">
                <div class="header bg-cyan">
                    <h2>Profile Information</h2>
                        <ul class="header-dropdown m-r--5 m-t--2">
                            <a href="{{ route('buyer.user.update') }}" class="btn btn-grad"><i class="material-icons">edit</i> Edit Profile</a>

                        </ul>
                </div>
              <br>
                <div class="card-body cardbody">
                    <div class="col-md-3">
                
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-sm-12 text-secondary user-img">
                                <img src="{{asset('users/'.$user->image)}}" alt="Admin" class="rounded-circles" width="120">
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

    @endif



@endsection



