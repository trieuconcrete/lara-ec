<div>
    <div class="header-action-icon-2 mr-6">
        <a href="{{ route('frontend.wishlist') }}">
            <img class="svgInject" alt="Surfside Media" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}">
            @if($wishListCount)
            <span class="pro-count blue">{{ $wishListCount }}</span>
            @endif
        </a>
    </div>
</div>
