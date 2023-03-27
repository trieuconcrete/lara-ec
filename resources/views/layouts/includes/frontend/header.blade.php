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
                    <a href="{{ route('frontend.home') }}"><img src="{{ (isset($settings['logo_header']) && $settings['logo_header']) ? \Storage::url($settings['logo_header']) : asset('assets/images/logo.png') }}" alt="logo"></a>
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
                    <a href="{{ route('frontend.home') }}"><img src="{{ (isset($settings['logo_header']) && $settings['logo_header']) ? \Storage::url($settings['logo_header']) : asset('assets/images/logo.png') }}" alt="logo"></a>
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
@include('layouts.includes.frontend.header_mobile')