<div>
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($sliders as $slider)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">{{ $slider->title_sm }}</h4>
                                <h2 class="animated fw-900">{{ $slider->title_md }}</h2>
                                <h1 class="animated fw-900 text-brand">{{ $slider->title }}</h1>
                                <p class="animated">{{ $slider->description }}</p>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('frontend.product.list') }}"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{ $slider->getImage() }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach              
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-1.png') }}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-2.png') }}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-3.png') }}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-4.png') }}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-5.png') }}" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-6.png') }}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <h3 class="section-title mb-20"><span>Trending</span> Products</h3>
            <div class="row product-grid-4">
                @foreach($products as $val)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('frontend.product.detail', $val->id) }}">
                                    <img class="default-img" src="{{ $val->getImage() }}" alt="">
                                    <img class="hover-img" src="{{ $val->getImage(1) }}" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                <a wire:loading.remove wire:target="addToWishList({{ $val->id }})" wire:click="addToWishList({{ $val->id }})" aria-label="Add To Wishlist" class="action-btn hover-up">
                                    <i class="fi-rs-heart"></i>
                                </a>
                                <div wire:loading wire:target="addToWishList({{ $val->id }})" class="spinner-grow text-warning" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="{{ route('frontend.product.list', optional($val->category)->slug ) }}">{{ optional($val->category)->name }}</a>
                            </div>
                            <h2><a href="{{ route('frontend.product.detail', $val->id) }}">{{ $val->name }}</a></h2>
                            <div class="product-price">
                                <span>${{ number_format($val->sale_price) }}</span>
                                @if($val->discount)
                                    <span class="old-price">${{ number_format($val->selling_price) }}</span>
                                    <small>{{ $val->sale_percent }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{ asset('frontend/assets/imgs/banner/banner-4.png') }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="#" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach($categories as $cat)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="{{ route('frontend.product.list', ['category' => $cat->slug]) }}"><img src="{{ $cat->getImage() }}" alt=""></a>
                        </figure>
                        <h5><a href="{{ route('frontend.product.list', ['category' => $cat->slug]) }}">{{ $cat->name }}</a></h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset('frontend/assets/imgs/banner/banner-1.png') }}" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset('frontend/assets/imgs/banner/banner-2.png') }}" alt="">
                        <div class="banner-text">
                            <span>Discount</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="{{ asset('frontend/assets/imgs/banner/banner-3.png') }}" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding product-new-arrivals">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach($productNewArrivals as $item)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('frontend.product.detail', $item->id) }}">
                                    <img class="default-img" src="{{ $item->getImage() }}" alt="">
                                    <img class="hover-img" src="{{ $item->getImage(1) }}" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a wire:click="addToWishList({{ $item->id }})" aria-label="Add To Wishlist" class="action-btn small hover-up" tabindex="0"><i class="fi-rs-heart"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('frontend.product.detail', $item->id) }}">{{ $item->name }}</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>${{ $item->selling_price }}</span>
                                <span class="old-price">${{ $item->original_price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--End product-cart-wrap-2-->
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding featured-brands">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach($brands as $brand)
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ $brand->getImage() }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
