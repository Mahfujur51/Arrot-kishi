@extends('layouts.supplier-app')

@section('buyer','active')
@section('buyer-index','active')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan">

                    <h2 class="text-center">Create Buyer</h2>

                </div>
                <div class="body">
                    <div class="row">

                        <form id="form_validation" action="{{route('supplier.buyer.update',$user->id)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"  name="name" required>

                                        <label class="form-label">Enter Buyer Name</label>
                                    </div>
                                    @error('name')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class="form-control @error('phone') is-invalid @enderror"  value="{{$user->phone}}" name="phone" required>

                                        <label class="form-label">Enter Buyer Phone Number</label>
                                    </div>
                                    @error('phone')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}" name="email" required>

                                        <label class="form-label">Enter Buyer Email</label>
                                    </div>
                                    @error('email')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('buyer_address') is-invalid @enderror"  value="{{$buyer->buyer_address}}" name="buyer_address" required>

                                        <label class="form-label">Enter Buyer Address</label>
                                    </div>
                                    @error('buyer_address')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('buyer_website') is-invalid @enderror" value="{{$buyer->buyer_website}}" name="buyer_website" required>

                                        <label class="form-label">Enter Buyer Website</label>
                                    </div>
                                    @error('buyer_website')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class=" form-control @error('tagline') is-invalid @enderror" value="{{$buyer->tagline}}" name="tagline" required>

                                        <label class="form-label">Enter Buyer Tagline</label>
                                    </div>
                                    @error('tagline')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Enter Buyer Type</label>
                                    <br>

                                    <input type="radio" name="buyer_type" id="non_profit" value="non_profit" class="with-gap" {{$buyer->buyer_type=='non_profit'?'checked':''}}>
                                    <label for="non_profit">Non Profit</label>

                                    <input type="radio" name="buyer_type" id="govt" value="govt" class="with-gap" {{$buyer->buyer_type=='govt'?'checked':''}} >
                                    <label for="govt" class="m-l-20">Govt</label>

                                    <input type="radio" name="buyer_type" id="limited" value="limited" class="with-gap" {{$buyer->buyer_type=='limited'?'checked':''}}  >
                                    <label for="limited" class="m-l-20">Limited</label>

                                    <input type="radio" name="buyer_type" id="proprietorship" value="proprietorship" class="with-gap" {{$buyer->buyer_type=='proprietorship'?'checked':''}} >
                                    <label for="proprietorship" class="m-l-20">Proprietorship</label><br>
                                    @error('buyer_type')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password">
                                        <label class="form-label">Password</label>
                                    </div>
                                    @error('password')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                        <label class="form-label">Enter Confirm Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Buyer Logo</label><img src="{{asset('image_buyer/user/'.$buyer->buyer_logo)}}" alt="" height="75px" width="75px">
                                    <input type="file"class=" @error('buyer_logo') is-invalid @enderror" value="{{$buyer->buyer_logo}}" name="buyer_logo">
                                    @error('buyer_logo')
                                    <span class="validation-message">{{ $message }}</span>
                                    @enderror


                                </div>



                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">




                                <div class="form-group form-float">

                                        <label class="form-label">Enter Buyer Trade License</label>
                                        <img src="{{asset('image_buyer/user/'.$buyer->trade_license)}}" alt="" height="75px" width="75px">
                                        <input type="file" class=" @error('trade_license') is-invalid @enderror" value="{{$buyer->trade_license}}" name="trade_license"  >
                                        @error('trade_license')
                                        <span class="validation-message">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input type="date" class=" form-control @error('expire_date') is-invalid @enderror" value="{{$buyer->expire_date}}" name="expire_date"  required>
                                        <label class="form-label">Trade Licence Expire date</label>

                                    </div>
                                    @error('expire_date')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror


                                </div>
                                <div class="header bg-cyan">

                                    <h2 class="text-center">Representative Information</h2>

                                </div>
                                <br>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('br_name') is-invalid @enderror" value="{{$buyer->br_name}}" name="br_name" >
                                        <label class="form-label">Enter Buyer Representative name</label>
                                    </div>
                                    @error('br_name')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('br_email') is-invalid @enderror" value="{{$buyer->br_email}}" name="br_email" >
                                        <label class="form-label">Enter Buyer Representative Email</label>
                                    </div>
                                    @error('br_email')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('br_phone') is-invalid @enderror" value="{{$buyer->br_phone}}" name="br_phone">
                                        <label class="form-label">Enter Buyer Representative Phone Number</label>
                                    </div>
                                    @error('br_phone')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class=" form-control @error('buyer_nid') is-invalid @enderror"  value="{{$buyer->buyer_nid}}" name="buyer_nid" required>

                                        <label class="form-label">Enter Buyer Representative NID Number</label>
                                    </div>
                                    @error('buyer_nid')
                                    <span class="validation-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Buyer Representative Image</label>
                                    <img src="{{asset('image_buyer/user/'.$buyer->br_image)}}" alt="" height="75px" width="75px">
                                    <input type="file" class=" @error('br_image') is-invalid @enderror" value="{{$buyer->br_image}}" name="br_image" >
                                    @error('br_image')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror


                                </div>
                                <button class="btn button  waves-effect pull-right" type="submit"><i class="material-icons">update</i> Update Buyer</button>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
@endsection


