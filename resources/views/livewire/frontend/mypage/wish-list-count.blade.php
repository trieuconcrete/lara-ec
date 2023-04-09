<div class="mr-5">
    <div class="header-action-icon-2">
        <a href="{{ $wishListCount ? route('frontend.mypage.wishlist') : '#' }}">
            <img class="svgInject" alt="Surfside Media" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}">
            @if($wishListCount)
            <span class="pro-count blue">{{ $wishListCount }}</span>
            @endif
        </a>
    </div>
</div>
