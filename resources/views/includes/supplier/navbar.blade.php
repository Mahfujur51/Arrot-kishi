<nav class="navbar no-print">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('supplier.index')}}"><img src="{{asset('users/'.Auth::user()->image)}}" alt="Supplier" height="50px" alt="">" alt="Supplier"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="navdesc"><span class="typing"></span> </li>
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        
                        <span class="label-count">{{  auth()->user()->unreadNotifications->count() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu" style="list-style: none">
                                {{-- <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>{{ $supplierUsers->count() }} new user added</h4>
                                            <p>
                                                <i class="material-icons">access_time</i>@if(isset($supplierUsers->latest()->first()->created_at)) {{ $supplierUsers->latest()->first()->created_at->diffForHumans() }} @endif mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                --}}
                                
                                @if(auth()->user()->unreadNotifications->count())
                                @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\OrderStatus') as $notification)
                                <li>
                                   <a href="{{ route('order.show',$notification->data['order_id']) }}">
                                       <div class="icon-circle bg-cyan">
                                           <i class="material-icons">add_shopping_cart</i>
                                       </div>
                                       <div class="menu-info">
                                           <h4>Order id #000{{ $notification->data['order_id'] }} is {{ $notification->data['status'] }}</h4>
                                           <p>
                                               <i class="material-icons">access_time</i>{{ $notification->created_at->diffForHumans() }}  
                                           </p>
                                       </div>
                                   </a>
                               </li>
                                @endforeach
                                @endif

                                @if(auth()->user()->unreadNotifications->count())
                                @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\NewOrder') as $notification)
                                <li>
                                   <a href="{{ route('order.show',$notification->data['order_id']) }}">
                                       <div class="icon-circle bg-cyan">
                                           <i class="material-icons">add_shopping_cart</i>
                                       </div>
                                       <div class="menu-info">
                                           <h4>{{ $notification->data['buyer_name'] }} created new order #000{{ $notification->data['order_id'] }}.</h4>
                                           <p>
                                               <i class="material-icons">access_time</i>{{ $notification->created_at->diffForHumans() }}  
                                           </p>
                                       </div>
                                   </a>
                               </li>
                                @endforeach
                                @endif
                                @if(auth()->user()->unreadNotifications->where('type','App\Notifications\SellerProduct')->count())
                                @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\SellerProduct') as $notification)
                                <li>
                                   <a href="{{ route('propose.product') }}">
                                       <div class="icon-circle bg-primary">
                                           <i class="material-icons">category</i>
                                       </div>
                                       <div class="menu-info">
                                           <h4>{{ $notification->data['seller_name'] }} propose product.</h4>
                                           <p>
                                               <i class="material-icons">access_time</i>{{ $notification->created_at->diffForHumans() }}  
                                           </p>
                                       </div>
                                   </a>
                               </li>
                                @endforeach
                                @endif
                                @if(auth()->user()->unreadNotifications->where('type','App\Notifications\OrderBill')->count())
                                @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\OrderBill') as $notification)
                                <li>
                                   <a href="{{ route('order.show',$notification->data['order_id']) }}">
                                       <div class="icon-circle bg-orange">
                                           <i class="material-icons">paid</i>
                                       </div>
                                       <div class="menu-info">
                                           <h4>{{ number_format($notification->data['payment_amount'],2) }} tk payment against #000{{ $notification->data['order_id'] }}.</h4>
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
                            <a href="{{ route('supplier.markread') }}">Mark all as read</a>
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
                        <li><a href="{{ route('supplier.profile.index') }}"><i class="material-icons">person</i>Profile</a></li>
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
                {{-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Footer display issue
                                            <small>32%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Make new buttons
                                            <small>45%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Create new dashboard
                                            <small>54%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Solve transition issue
                                            <small>65%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Answer GitHub questions
                                            <small>92%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Tasks</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
</nav>
