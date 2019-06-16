<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="tel:0123456789"><i class="fa fa-phone"></i>0123456789</a></li>
                            <li><a href="mailto:admin@bici.com"><i class="fa fa-envelope"></i>admin@bici.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset("images/logo-bici-1.png") }}" alt="BiCi Cosmetic" height="70px" width="105px" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>

                            <li>
                                <a href="{{ route('product.shoppingCart') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart
                                    <span class="badge">{{ session()->has('cart') ? session()->get('cart')->totalQty : '' }}</span>
                                </a>
                            </li>
                            <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>

                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                        <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i>Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-archive"></i>Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                {{--<ul role="menu" class="sub-menu">--}}
                                    {{--<li><a href="shop.html">Products</a></li>--}}
                                    {{--<li><a href="product-details.html">Product Details</a></li> --}}
                                    {{--<li><a href="checkout.html">Checkout</a></li> --}}
                                    {{--<li><a href="cart.html">Cart</a></li> --}}
                                    {{--<li><a href="login.html">Login</a></li> --}}
                                {{--</ul>--}}
                            </li> 
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                {{--<ul role="menu" class="sub-menu">--}}
                                    {{--<li><a href="blog.html">Blog List</a></li>--}}
                                    {{--<li><a href="blog-single.html">Blog Single</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li><a href="{{ route('contact') }}">{{ __('contact.contact') }}</a></li>
                            <li><a href="{{ route('term') }}">{{ __('term.term') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
