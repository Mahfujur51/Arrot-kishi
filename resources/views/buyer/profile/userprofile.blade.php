@extends('layouts.buyer-app')
@section('profile','active')
@section('title','Create user')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan">

                    <h2 class="text-center">Update @if(Auth::user()->role=='procurement') Procurement @elseif(Auth::user()->role=='warehouse') Warehouse @elseif(Auth::user()->role=='accounts')Accounts @endif</h2>

                </div>
                <div class="body">

                    <form id="form_validation" method="POST" action="{{ route('buyer.user.porfile-update') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ $user->name }}" required>
                                        <label class="form-label">Enter Name</label>
                                    </div>
                                    @error('name')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ $user->email}}" required>
                                        <label class="form-label">Enter Email</label>
                                    </div>
                                    @error('email')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ $user->phone}}" required>
                                        <label class="form-label">Enter Phone</label>
                                    </div>
                                    @error('phone')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                               name="image">
                                        <img src="{{asset('users/'.$user->image)}}" height="80px" width="80px" alt="">
                                        {{-- <label class="form-label">Image</label> --}}
                                    </div>
                                    @error('image')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line @error('password') error @enderror">
                                        <input type="password" class="form-control"
                                               name="password" value="{{ old('password') }}" >
                                        <label class="form-label">Password</label>
                                    </div>
                                    @error('password')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" value="{{ old('password_confirmation') }}" >
                                        <label class="form-label">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn button waves-effect" type="submit"><i class="material-icons">update</i>Update @if(Auth::user()->role=='procurement') Procurement @elseif(Auth::user()->role=='warehouse') Warehouse @else Accounts @endif</button>
                            </div>

                        </div>


                    </form>


                </div>

            </div>

        </div>
@endsection
@section('page-scripts')


@endsection
