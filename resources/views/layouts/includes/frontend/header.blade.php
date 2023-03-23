<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="#">View details</a></li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="#">Shop now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            @if (!Auth::check())                                
                                <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Log In </a>  / <a href="{{ route('register') }}">Sign Up</a></li>
                            @else
                                <li>
                                    <a class="language-dropdown-active" href="#"> {{ auth()->user()->name }} <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="{{ route('frontend.user.profile') }}">Profile</a></li>
                                        <li class="mt-10"><a href="{{ route('frontend.mypage.orders') }}">Orders</a></li>
                                        <li class="mt-10">
                                            <a href="{{ route('logout') }}" 
                                            onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('frontend.home') }}"><img src="{{ isset($settings['logo_header']) ? \Storage::url($settings['logo_header']) : asset('assets/images/logo.png') }}" alt="logo"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        @livewire('frontend.home.form-search')
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @livewire('frontend.mypage.wish-list-count')
                            @livewire('frontend.mypage.cart-count')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('frontend.home') }}"><img src="https://laravel.com/img/logotype.min.svg" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                @foreach($categories as $cat)
                                <li><a href="{{ route('frontend.product.list', ['category' => $cat->slug]) }}"><i class="surfsidemedia-font-desktop"></i>{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="#">Home </a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="{{ route('frontend.product.list') }}">Shop</a></li>
                                <li><a href="#">Blog </a></li>                                    
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Phone</span> {{ $settings['phone'] ?? null }} </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @livewire('frontend.mypage.wish-list-count')
                        @livewire('frontend.mypage.cart-count')
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('frontend.home') }}"><img src="{{ isset($settings['logo_footer']) ? \Storage::url($settings['logo_header']) : asset('assets/images/logo.png') }}" alt="logo"></a></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                            <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">shop</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Blouses & Shirts</a></li>
                                        <li><a href="#">Hoodies & Sweatshirts</a></li>
                                        <li><a href="#">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Jackets</a></li>
                                        <li><a href="#">Casual Faux Leather</a></li>
                                        <li><a href="#">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Gaming Laptops</a></li>
                                        <li><a href="#">Ultraslim Laptops</a></li>
                                        <li><a href="#">Tablets</a></li>
                                        <li><a href="#">Laptop Accessories</a></li>
                                        <li><a href="#">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="login.html">Log In </a>                        
                </div>
                <div class="single-mobile-header-info">                        
                    <a href="register.html">Sign Up</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">(+1) 0000-000-000 </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</div> 