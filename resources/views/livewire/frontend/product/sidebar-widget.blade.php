<div>
    <!-- Product sidebar Widget -->
    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
        <div class="widget-header position-relative mb-20 pb-10">
            <h5 class="widget-title mb-10">New products</h5>
            <div class="bt-1 border-color-1"></div>
        </div>
        @foreach($new_products as $item)
        <div class="single-post clearfix">
            <div class="image">
                <img src="{{ $item->getImage() }}" alt="#">
            </div>
            <div class="content pt-10">
                <h5><a href="{{ route('frontend.product.detail', $item->slug) }}">{{ $item->name }}</a></h5>
                <p class="price mb-0 mt-5">{{ money($item->selling_price) }}</p>
            </div>
        </div>
        @endforeach
    </div>                        
</div>
