@extends('layouts.supplier-app')


@section('seller','active')


@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan">

                    <h2 class="text-center">Update Seller</h2>

                </div>
                <div class="body">
                    <div class="row">
                        <form id="form_validation" action="{{route('supplier.seller.update',$user->id)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name" required>
                                        <label class="form-label">Enter Seller Name</label>
                                    </div>
                                    @error('name')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class="form-control @error('phone') is-invalid @enderror"  value="{{$user->phone}}" name="phone" required>
                                        <label class="form-label">Enter Phone Number</label>
                                    </div>
                                    @error('phone')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}" name="email" required>
                                        <label class="form-label">Enter Seller Email</label>
                                    </div>
                                    @error('email')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('seller_address') is-invalid @enderror" value="{{$seller->seller_address}}" name="seller_address" required>
                                         <label class="form-label">Enter Seller Address</label>
                                    </div>
                                    @error('seller_adress')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('seller_website') is-invalid @enderror" value="{{$seller->seller_website}}" name="seller_website" required>
                                        <label class="form-label">Enter Seller Website</label>
                                    </div>
                                    @error('seller_website')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                        <label class="form-label">Password</label>
                                    </div>
                                    @error('password')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                        <label class="form-label">Enter Confirm Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Seller Image</label>
                                     <img src="{{asset('image_seller/user/'.$user->image)}}" alt="" height="75px" width="75px">
                                    <input type="file" class=" @error('image') is-invalid @enderror" value="{{$user->image}}"name="image"  >
                                    @error('image')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>


                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                <div class="header bg-cyan">

                                    <h2 class="text-center">Representative Information</h2>

                                </div>
                                <br>
                                <br>
                                

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('sr_name') is-invalid @enderror" value="{{$seller->sr_name}}" name="sr_name" >
                                        <label class="form-label">Enter Seller Representative name</label>
                                    </div>
                                    @error('sr_name')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('sr_email') is-invalid @enderror" value="{{$seller->sr_email}}" name="sr_email" >
                                        <label class="form-label">Enter Seller Representative Email</label>
                                    </div>
                                    @error('sr_email')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('sr_phone') is-invalid @enderror" value="{{$seller->sr_phone}}" name="sr_phone">
                                        <label class="form-label">Enter Seller Representative Phone</label>
                                    </div>
                                    @error('sr_phone')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class=" form-control @error('seller_nid') is-invalid @enderror"  value="{{$seller->seller_nid}}" name="seller_nid" required>
                                        <label class="form-label">Enter Seller Representative NID Number</label>
                                    </div>
                                    @error('seller_nid')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Seller Representative Image</label>
                                    <img src="{{asset('image_seller/user/'.$seller->sr_image)}}" alt="" height="75px" width="75px">
                                    <input type="file" class=" @error('sr_image') is-invalid @enderror" value="{{old('sr_image')}}" name="sr_image" >
                                    @error('sr_image')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                                <button class="btn button waves-effect custom-btn" type="submit"><i class="material-icons">update</i> Update Seller </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

@endsection


