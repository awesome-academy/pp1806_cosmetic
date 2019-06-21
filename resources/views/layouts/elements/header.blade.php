<header id="header"><!--header-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset("images/logo-bici-1.png") }}" alt="BiCi Cosmetic" height="70px" width="105px" /></a>
                    </div>
                    <div class="btn-group pull-right">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('product.shoppingCart') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart
                                    <span class="badge">{{ session('cart') ? session('cart')->totalQuantity : '' }}</span>
                                </a>
                            </li>
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

                                    @if(!Auth::user()->id)
                                        <a href="{{ route('login') }}">
                                    @endif
                                    <li><a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fa fa-user"></i> My Profile</a></li>
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
                            <li><a href="{{route('category.index')}}">Category<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($category as $cate)
                                        @if($cate->parent_id == 0)
                                            <li><a href="{{ route('category.type', $cate->id) }}">{{ $cate->name }}</a>
                                                <ul role="menu" class="sub-sub-menu">
                                                    @foreach($category as $catechild)
                                                        @if($catechild->parent_id == $cate->id)
                                                            <li><a href="{{ route('category.type', $catechild->id) }}">{{ $catechild->name }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">{{ __('contact.contact') }}</a></li>
                            <li><a href="{{ route('term') }}">{{ __('term.term') }}</a></li>
                        </ul>
                    </div>
                </div>
                <form method="get" action="{{ route('search') }}" class="searchform" >
                    {{ csrf_field() }}
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" name="name" placeholder="Search" style="color: #122b40"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
