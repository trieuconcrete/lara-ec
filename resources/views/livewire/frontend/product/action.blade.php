<div>
    <div class="attr-detail attr-color mb-15">
        @if ($product->productColors->count() > 0)
            <strong class="mr-10">Color</strong>
            <ul class="list-filter color-filter">
                @foreach($product->productColors as $item)
                    <li class="{{ $this->colorId == $item->color_id ? 'active' : '' }}"><a wire:click="colorSelected({{ $item->color_id }})" data-color="{{ $item->color->name }}"><span class="product-color-{{ $item->color->code }}"></span></a></li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="attr-detail attr-size">
        <strong class="mr-10">Size</strong>
        <ul class="list-filter size-filter font-small">
            <li><a href="#">S</a></li>
            <li class="active"><a href="#">M</a></li>
            <li><a href="#">L</a></li>
            <li><a href="#">XL</a></li>
            <li><a href="#">XXL</a></li>
        </ul>
    </div>
    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
    <div class="detail-extralink">
        <div class="detail-qty border radius">
            <a wire:click="productQuantity('down')" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
            <span class="qty-val">{{ $this->quantityCount }}</span>
            <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="hidden">
            <a wire:click="productQuantity('up')" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
        </div>
        <div class="product-extra-link2">
            <button wire:loading.remove wire:target="addToCart({{ $product->id }})" wire:click="addToCart({{ $product->id }})" class="button button-add-to-cart">
                Add to cart
            </button>
            <div wire:loading wire:target="addToCart({{ $product->id }})" class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <a wire:loading.remove wire:target="addToWishList({{ $product->id }})" wire:click="addToWishList({{ $product->id }})" aria-label="Add To Wishlist" class="action-btn hover-up">
                <i class="fi-rs-heart"></i>
            </a>
            <div wire:loading wire:target="addToWishList({{ $product->id }})" class="spinner-grow text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>
