<div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{ number_format($products->total()) }}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a wire:click="sortBy('DESC')">Price: Low to High</a></li>
                                        <li><a wire:click="sortBy('ASC')">Price: High to Low</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @if($products)
                            @foreach($products as $val)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('frontend.product.detail', $val->id) }}">
                                                    <img class="default-img" src="{{ $val->getImage() }}" alt="">
                                                    <img class="hover-img" src="{{ $val->getImage(1) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
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
                        @else
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                Product Not Found
                            </div>
                        @endforelse
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $products->links() }}
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Fill by price</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                    </div>
                                    <input type="text" wire:model.defer="priceFrom" name="priceFrom" value="100" class="hidden">
                                    <input type="text" wire:model.defer="priceTo" name="priceTo" value="500" class="hidden">
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Brand</label>
                                <div class="custome-checkbox">
                                    @foreach($brands as $brand)
                                        <input class="form-check-input" type="checkbox" wire:model="brandInputs" id="exampleCheckbox{{$brand->id}}" value="{{ $brand->id }}">
                                        <label class="form-check-label" for="exampleCheckbox{{$brand->id}}"><span>{{ $brand->name }}</span></label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button wire:click="filterProduct()" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</button>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach($new_products as $product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ $product->getImage() }}" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('frontend.product.detail', $product->id) }}">{{ $product->name }}</a></h5>
                                <p class="price mb-0 mt-5">${{ number_format($product->selling_price) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="{{ asset('frontend/assets/imgs/banner/banner-11.jpg') }}" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
