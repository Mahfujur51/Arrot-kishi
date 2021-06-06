<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('seller.index')}}"><img src="{{asset('image_seller/user/'.Auth::user()->image)}}" alt="seller" height="50px" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="navdesc"> {{Auth::user()->name}}</li>
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">{{ auth()->user()->notifications->count() }}</span>
                    </a>
                    <ul class="dropdown-menu" >
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu" style="list-style: none">
                                {{-- <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>12 new members joined</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li> --}}
                                @if(auth()->user()->unreadNotifications->where('type','App\Notifications\SellerProductStatus'))
                                @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\SellerProductStatus') as $notification)
                                    
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">category</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Product id {{ $notification->data['product_id'] }} is {{ $notification->data['status'] }}</h4>
                                            <p>
                                                <i class="material-icons">access_time</i>{{ $notification->created_at->diffForHumans() }}  
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                              @endif
                              @if(auth()->user()->unreadNotifications->where('type','App\Notifications\PurchaseNotification'))
                              @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\PurchaseNotification') as $notification)
                                  
                              <li>
                                  <a href="{{ route('seller.purchase.show',$notification->data['purchase_id']) }}">
                                      <div class="icon-circle bg-cyan">
                                          <i class="material-icons">category</i>
                                      </div>
                                      <div class="menu-info">
                                          <h4>Sales id #000{{ $notification->data['purchase_id'] }} and amount {{ number_format($notification->data['amount'],2) }}</h4>
                                          <p>
                                              <i class="material-icons">access_time</i>{{ $notification->created_at->diffForHumans() }}  
                                          </p>
                                      </div>
                                  </a>
                              </li>
                              @endforeach
                            @endif
                            </ul>
                        </li>
                        @if(auth()->user()->unreadNotifications->count())
                        <li class="footer">
                            <a href="{{ route('seller.markasread') }}">Mark all as read</a>
                        </li>
                        @endif
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">exit_to_app</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('seller.profile.index') }}"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>

                    <li>  <a  href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Log Out

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                    </ul>
                </li> 
                <!-- #END# Tasks -->
            </ul>
        </div>
    </div>
</nav>
