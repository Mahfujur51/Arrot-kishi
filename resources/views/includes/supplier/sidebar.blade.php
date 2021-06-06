<aside id="leftsidebar" class="sidebar no-print">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('backend/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{route('supplier.profile.index')}}"><i class="material-icons">person</i>Profile</a></li>

                    <li role="seperator" class="divider"></li>
                    <li>  <a  href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a></li>
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
                <a href="{{route('supplier.index')}}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>

            <li class="@yield('buyer')">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">group_add</i>
                    <span>Buyer</span>
                </a>
                <ul class="ml-menu">
                    <li class="@yield('create')">
                        <a href="{{route('supplier.buyer.create')}}">Create Buyer</a>
                    </li>
                    <li class="@yield('buyer-index')">
                        <a href="{{route('supplier.buyer.index')}}">All Buyer</a>
                    </li>
                </ul>
            </li>

            <li class="@yield('product')">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">production_quantity_limits</i>
                    <span>Product</span>
                </a>
                <ul class="ml-menu">
                    <li class="@yield('product-list')">
                        <a href="{{ route('products.index') }}">Product List</a>
                    </li>
                    <li class="@yield('product-create')">
                        <a href="{{ route('products.create') }}">Product create</a>
                    </li>
                    <li class="@yield('unit')">
                        <a href="{{ route('unit.index') }}">Product Unit</a>
                    </li>
                </ul>
            </li>
            <li class="@yield('supplier-order')">
                <a href="{{route('order.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="@yield('supplier-purchase')">
                <a href="{{route('purchases.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <span>Purchase</span>
                </a>
            </li>
            <li>
                <li class="@yield('seller')">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">queue</i>
                    <span>Seller</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('seller-create')">
                        <a href="{{route('supplier.seller.create')}}">Create Seller</a>
                    </li>
                    <li class="@yield('all-seller')">
                        <a href="{{route('supplier.seller.index')}}">All Seller</a>
                    </li>
                </ul>
            </li>
            <li class="@yield('propose')">
                <a href="{{route('propose.product')}}">
                    <i class="material-icons">local_activity</i>
                    <span>Propose Product</span>
                </a>
            </li>

            <li class="@yield('user')">
                <a href="{{route('users.index')}}">
                    <i class="material-icons">forum</i>
                    <span>Support User</span>
                </a>
            </li>
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
