<div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                @if ($item->product)
                                <tr>
                                    <td class="image product-thumbnail">
                                        <img src="{{ $item->product->getImage() }}" alt="#">
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('frontend.product.detail', $item->product->id) }}">{{ $item->product->name }}</a>
                                    </td>
                                    <td class="price" data-title="Price"><span>${{ $item->product->selling_price }}</span></td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted">
                                        <span wire:click="removeWishlist({{ $item->id }})" wire:loading.remove wire:target="removeWishlist({{ $item->id }})">
                                            <i class="fi-rs-trash text-red"></i></a>
                                        </span>
                                        <span wire:loading wire:target="removeWishlist({{ $item->id }})">
                                            Removing...
                                        </span>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-end">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear wishlist</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
