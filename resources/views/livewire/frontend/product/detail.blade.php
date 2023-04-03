<div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @if (optional($product->productImages))
                                            @foreach($product->productImages as $image)
                                            <figure class="border-radius-10">
                                                <img src="{{ $image->getImage() }}" alt="product image">
                                            </figure>
                                            @endforeach
                                            @else
                                            <figure class="border-radius-10">
                                                <img src="{{ $product->getImage() }}" alt="product image">
                                            </figure>
                                        @endif
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        @if (optional($product->productImages))
                                            @foreach($product->productImages as $image)
                                            <div><img src="{{ $image->getImage() }}" alt="product image"></div>
                                            @endforeach
                                            @else
                                            <figure class="border-radius-10">
                                                <img src="{{ $product->getImage() }}" alt="product image">
                                            </figure>
                                        @endif
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Brands: <a href="#">{{ optional($product->brand)->name }}</a></span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:{{ ((int)round($product->product_rating) * 2) * 10 }}%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ $product->review_count }} reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">${{ number_format($product->selling_price) }}</span></ins>
                                            <ins><span class="old-price font-md ml-15">${{ number_format($product->original_price) }}</span></ins>
                                            <span class="save-price  font-md color3 ml-15">{{ $product->discout . "% Off" }}</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>
                                            {{ $product->small_description }}
                                        </p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    @livewire('frontend.product.action', ['product' => $product])
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                        <li>Availability:<span class="in-stock text-success ml-5">
                                            {{ $product->quantity ? $product->quantity . ' Items In Stock' : 'Items Out Of Stock' }}</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $product->review_count }})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        {{ $product->description }}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    @livewire('frontend.product.review', ['product' => $product])
                                </div>
                            </div>
                        </div>
                        <!-- Related products -->
                        @livewire('frontend.product.related-product', ['product' => $product])
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <!-- Sidebar Widget -->
                    @livewire('frontend.product.sidebar-widget')
                </div>
            </div>
        </div>
    </section>
</div>
