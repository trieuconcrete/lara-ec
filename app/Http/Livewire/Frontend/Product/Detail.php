<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{
    // protected $product;
    public $product, $productId, $colorId, $productColorQtyCheck = true;

    public function colorSelected($colorId)
    {
        $this->productColorQtyCheck = true;
        $this->colorId = $colorId;
        $productColor = $this->product->productColors()->where('color_id', $this->colorId)->first();
        $productColorQty = $productColor->quantity;
        if (!$productColorQty) {
            $this->productColorQtyCheck = false;
        }
    }

    public function addToWishList($productId)
    {
        $this->productId = $productId;
        if (Auth::check()) {
            if (WishList::where([
                'user_id' => auth()->user()->id,
                'product_id' => $this->productId
            ])->exists()) {
                $message = 'Already Added to wishlist';
                $type = 'warning';
                $status = 200;
            } else {
                $wishlist = WishList::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->productId
                ]);
                $this->emit('wishListAddedUpdate');
                $message = 'Wishlist Added Successfuly';
                $type = 'success';
                $status = 200;
            }
        } else {
            $message = 'Please login to continue';
            $type = 'message';
            $status = 401;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'product' => $this->product
        ]);
    }
}
