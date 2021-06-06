@extends('layouts.buyer-app')
@section('title','Create user')
@section('page-styles')

@endsection
@section('buyer-user', 'active')
@section('buyer-user-create', 'active')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan text center">

                    <h2 class="text-center">Create Buyer user</h2>

                </div>
                <div class="body">

                    <form id="form_validation" method="POST" action="{{ route('buyer-users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required>
                                        
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
                                            name="email" value="{{ old('email') }}" required >
                                        
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
                                            name="phone" value="{{ old('phone') }}" required>
                                        
                                        <label class="form-label">Enter Phone</label>
                                    </div>
                                    @error('phone')
                                    <span class="validation-message">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image">
                                        
                                        {{-- <label class="form-label">Image</label> --}}
                                    </div>
                                    @error('image')
                                    <span class="validation-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" required>
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
                                            name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                            <label class="form-label">Confirm Password</label>
                                      
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" >
                                    <label for="">User Role</label><br>
                                    <input type="radio" name="role" value="procurement" id="procurement" class="with-gap">
                                    <label for="procurement">Procurement</label>

                                    <input type="radio" name="role" value="accounts" id="accounts" class="with-gap">
                                    <label for="accounts" class="m-l-20">Accounts</label>

                                    <input type="radio" name="role" value="warehouse" id="warehouse" class="with-gap">
                                    <label for="warehouse" class="m-l-20">Warehouse</label>
                                </div>
                                
                            </div>
                            <button class="btn button waves-effect custom-btn item pull-right" type="submit"><i class="material-icons">library_add</i> Create User</button>
                        </div>


                    </form>


                </div>

            </div>

        </div>
    @endsection
    @section('page-scripts')


    @endsection
