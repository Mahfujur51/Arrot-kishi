<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('image_seller/user/'.Auth::user()->seller->sr_image)}}" width="48" height="48" alt="User" />

        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ route('seller.profile.index') }}"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li>  <a  href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('dashboard')">
                <a href="{{route('seller.index')}}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>

            <li class="@yield('product-create')">
                <a href="{{route('seller.product.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <span>Product</span>
                </a>
            </li>
            <li class="@yield('Propose-product')">
                <a href="{{route('seller.propose.product')}}">
                    <i class="material-icons">local_activity</i>
                    <span>Proposed Product</span>
                </a>
            </li>
            <li class="@yield('seller-purchase')">
                <a href="{{route('seller-purchase.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <span>Sales</span>
                </a>
            </li>
            <li class="@yield('support')">
                <a href="{{route('support.index')}}">
                    <i class="material-icons">support</i>
                    <span>Support</span>
                </a>
            <li>
            <li>
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i><span>Sign Out</span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            <li>

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &#169; <span id="date"></span> <a href="https://www.selevenit.com/">S11Limited</a>.
        </div>
        <div class="version">
            <a href="https://www.selevenit.com/">www.selevenit.com</a>
        </div>
    </div>
    <!-- #Footer -->
</aside>
