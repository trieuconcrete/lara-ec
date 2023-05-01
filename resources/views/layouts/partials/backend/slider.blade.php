<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="47">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="47">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('backend.dashboard') }}">
                        <i class="ri-dashboard-line"></i> <span data-key="t-dashboard"> {{ __('menu.dashboard') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarShops" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarShops">
                        <i class="ri-shopping-cart-2-line"></i> <span data-key="t-shop"> {{ __('menu.shop') }} </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarShops">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('backend.product.index') }}" class="nav-link" data-key="t-products"> {{ __('menu.products') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.customer.index') }}" class="nav-link" data-key="t-customers"> {{ __('menu.customers') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-orders"> {{ __('menu.orders') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-categories"> {{ __('menu.categories') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-brands"> {{ __('menu.brands') }} </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBlogs" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBlogs">
                        <i class="ri-newspaper-line"></i> <span data-key="t-blog">{{ __('menu.blog') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBlogs">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-posts"> {{ __('menu.posts') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-categories"> {{ __('menu.categories') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-authors"> {{ __('menu.authors') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSiteSettings" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSiteSettings">
                        <i class="ri-settings-3-line"></i> <span data-key="t-siteSettings">{{ __('menu.site_setting') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSiteSettings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-sliders"> {{ __('menu.sliders') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-banners"> {{ __('menu.banners') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-settings"> {{ __('menu.settings') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
