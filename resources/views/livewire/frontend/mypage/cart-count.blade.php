<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{ route('frontend.mypage.cart') }}">
            <img alt="Surfside Media" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}">
            @if ($cartCount)
            <span class="pro-count blue">{{ $cartCount }}</span>
            @endif
        </a>
        @if($carts)
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @foreach($carts as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="#"><img alt="Surfside Media" src="{{ $item->product->getImage() }}"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{ route('frontend.product.detail', $item->product_id) }}">{{ substr($item->product->name, 0, 20) }}...</a></h4>
                        <h4><span>{{ $item->quantity }} × </span>${{ $item->product->selling_price }}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{ $carts->sum('sub_total_price') }}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{ route('frontend.mypage.cart') }}" class="outline">View cart</a>
                    <a href="{{ route('frontend.mypage.checkout') }}">Checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
