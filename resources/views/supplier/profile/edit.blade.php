@extends('layouts.supplier-app')
@section('dashboard','active')
@section('title','Update profile')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan">
                    <h2 class="text-center">Update Profile</h2>
                </div>
                <div class="body">

                    <form id="form_validation" method="POST" action="{{route('supplier.porfile-update')}}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name',$user->name) }}" required>

                                        <label class="form-label">Enter Name</label>
                                    </div>
                                    @error('name')
                                     <span class="validation-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('name',$user->email) }}" required>

                                        <label class="form-label">Enter Email</label>
                                    </div>
                                  @error('email')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone',$user->phone) }}">
                                        <label class="form-label">Enter Phone</label>
                                    </div>
                                    @error('phone')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                               name="image">
                                        <img src="{{asset('users/'.$user->image)}}" height="80px" width="80px" alt="">

                                    </div>
                                    @error('image')
                                    <span class="validation-message">{{ $message }}</span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line ">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                               name="password" >
                                        <label class="form-label">Password</label>

                                    </div>
                                    @error('password')
                                        <span class="validation-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation"  >
                                        <label class="form-label">Confirm Password</label>

                                    </div>
                                </div>
                            </div>
                            <button class="btn button waves-effect custom-btn" type="submit"><i class="material-icons">update</i>Update Profile</button>

                        </div>


                    </form>


                </div>

            </div>

        </div>
@endsection
@section('page-scripts')


@endsection
