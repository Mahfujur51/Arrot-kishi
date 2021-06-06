@extends('layouts.login-app')

@section('login_content')

<div class="container-fluid conya">
        <div class="side-left">
            <div class="sid-layy">
                <div class="row slid-roo">
                    <div class="data-portion">
                        <h2>Manage Your orders</h2>
                        <p>Add captions to your slides easily with the .carousel-caption element within any .carousel-item. They can be easily hidden on smaller viewports, as shown below, with optional display utilities. We hide them initially with .d-none and bring them back on medium-sized devices </p>
                        <ul>
                            <li>Ph :- +880-1947179930</li>
                            <li>Email :- support@selevenit.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
         @csrf
        <div class="side-right">
            <img class="logo" src="{{asset('user_login')}}/assets/images/download.png" alt="">
            
            <h2>Reset Your Password</h2>
             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            
            <div class="form-row">
                <label for="">Email ID</label>
                <input type="text" placeholder="yourname@company.com" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            
            <div class="form-row dfr">
                <button class="btn btn-sm btn-success">Reset</button>
            </div>
            
            
            <div class="ord-v">
                <a href="or login with"></a>
            </div>
            
            <div class="soc-det">
                <ul>
                    <li class="facebook"><i class="fab fa-facebook-f"></i></li>
                    <li class="twitter"><i class="fab fa-twitter"></i></li>
                    <li class="pin"><i class="fab fa-pinterest-p"></i></li>
                    <li class="link"><i class="fab fa-linkedin-in"></i></li>
                   
                </ul>
            </div>
            
            
            
        </div>
        </form>
        <div class="copyco">
               <p>Copyright <span id="date"></span> @ selevenit.com</p> 
            </div>
    </div> 

@endsection
