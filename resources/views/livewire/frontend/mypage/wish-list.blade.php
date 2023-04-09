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
                                @foreach ($products as $prod)
                                <tr>
                                    <td class="image product-thumbnail">
                                        <img src="{{ $prod->getImage() }}" alt="#">
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('frontend.product.detail', $prod->slug) }}">{{ $prod->name }}</a>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{ money($prod->selling_price) }}</span></td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted">
                                        <span wire:click="removeWishlist({{ $prod->id }})" wire:loading.remove wire:target="removeWishlist({{ $prod->id }})">
                                            <i class="fi-rs-trash text-red"></i></a>
                                        </span>
                                        <span wire:loading wire:target="removeWishlist({{ $prod->id }})">
                                            Removing...
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                @if ($products)
                                <tr>
                                    <td colspan="4" class="text-end">
                                        <a wire:click="removeAllWishlist()" wire:loading.remove wire:target="removeAllWishlist()" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear wishlist</a>
                                        <span wire:loading wire:target="removeAllWishlist()">
                                            Removing...
                                        </span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
