@extends('layouts.supplier-app')
@section('page-styles')
<link href="{{ asset('backend/css/profile.css') }}" rel="stylesheet">

@endsection
@section('seller','active')
@section('content')


      <div class="container-fluid">

       <div class="row gutters-sm">
            <div class="card">
              <div class="header bg-cyan">
              <h2 class="text-center">
                Seller Information
              </h2>

              <ul class="header-dropdown m-r--5 m-t--2">
                        <a href="{{ route('supplier.seller.edit',$user->id) }}" class="btn btn-grad"><i class="material-icons">edit</i> Edit Profile</a>

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
                      <img src="{{asset('image_seller/user/'.$user->image)}}" alt="Admin" class="rounded-circle" width="120">
                    </div>
              </div>
          </div>
            <div class="col-md-4">
              <div class="row">
                    <div class="col-sm-12 ">
                      <h5 class="mb-0"><span>Name:</span>  {{$seller->seller_name}}</h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Email:</span> {{$seller->seller_email}}</h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Seller Id:</span> {{$seller->seller_id}}</h5>
                    </div>
                  </div>


            </div>
            <div class="col-md-4">
                    <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0 "><span>Phone:</span> {{$seller->seller_telephone}}</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Website:</span> {{$seller->seller_website}}</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Address:</span> {{$seller->seller_address}}</h5>
                    </div>
                  </div>
            </div>

          </div>
          </div>


          <div class="row gutters-sm">
            <div class="card card-sr">
              <div class="header bg-cyan">
              <h2 class="text-center">
                Seller Representive
              </h2>
              </div>
              <br>
          <div class="card-body cardbody">
            <div class="col-md-4">
            <div class="row">
                    <div class="col-sm-5">
                      <h5 class="mb-0 "></h5>
                    </div>
                    <div class="col-sm-6 text-secondary ">
                      <img src="{{asset('image_seller/user/'.$seller->sr_image)}}" alt="Admin" class="rounded-circle" width="120">
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                    <div class="col-sm-12 ">
                      <h5 class="mb-0"><span>Name:</span>  {{$seller->sr_name}}</h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0"><span>Phone:</span> {{$seller->sr_phone}}</h5>
                    </div>
                  </div>




            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="mb-0"><span>Email:</span> {{$seller->sr_email}}</h5>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-sm-12">
                      <h5 class="mb-0 "><span>NID:</span> {{$seller->seller_nid}}</h5>
                    </div>
                  </div>

            </div>

          </div>
          </div>


      </div>
            <!-- #END# Colored Card - With Loading -->


@endsection



