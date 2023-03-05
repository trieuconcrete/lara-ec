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
</div>
