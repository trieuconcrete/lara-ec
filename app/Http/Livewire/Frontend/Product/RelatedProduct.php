<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class RelatedProduct extends Component
{
    public $product, $productId;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToWishList($productId)
    {
        $this->productId = $productId;
        $wishlist = session()->get('wishlist');
        if(isset($wishlist[$this->productId])) {
            $message = 'Already Added to wishlist';
            $type = 'warning';
            $status = 200;
        } else {
            $wishlist[$this->productId] = $this->productId;
            session()->put('wishlist', $wishlist);
            $this->emit('wishListAddedUpdate');
            $message = 'Wishlist Added Successfuly';
            $type = 'success';
            $status = 200;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.product.related-product', [
            'product' => $this->product
        ]);
    }
}
