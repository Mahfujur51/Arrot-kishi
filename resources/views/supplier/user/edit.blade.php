@extends('layouts.supplier-app')
@section('title','Edit user')
@section('page-styles')

@endsection
@section('user', 'active')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-cyan">

                    <h2 class="text-center">Edit User</h2>

                </div>
                <div class="body">

                    <form id="form_validation" method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name',$user->name) }}" required>
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
                                            name="email" value="{{ old('email',$user->email) }}" required>
                                    </div>
                                    @error('email')
                                        <span class="validation-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone',$user->phone) }}" required>
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
                                <div class="form-group">
                                    <div class="form-line @error('password') error @enderror">
                                        <input type="password" class="form-control"
                                            name="password" value="{{ old('password') }}">
                                            <label class="form-label">New Password</label>
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
                                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            <label class="form-label">Confirm New Password</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn button waves-effect custom-btn" type="submit"><i class="material-icons">update</i> Update User</button>
                        </div>


                    </form>


                </div>

            </div>

        </div>
    @endsection
    @section('page-scripts')


    @endsection
