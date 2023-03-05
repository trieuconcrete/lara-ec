<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class Action extends Component
{
    public $product, $productId, $colorId, $productColorQtyCheck = true, $quantityCount = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

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

    public function productQuantity($option)
    {
        if ($option == 'down' && $this->quantityCount > 1) {
            $this->quantityCount --;
        }
        if ($option == 'up') {
            $this->quantityCount ++;
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

    public function addToCart($productId)
    {
        $this->productId = $productId;
        if (Auth::check()) {
            if ($this->product->where('id', $this->productId)->where('status', 1)->exists()) {
                // check product color & product quantity
                if ($this->product->quantity > 0) {
                    if ($this->product->quantity < $this->quantityCount) {
                        $message = 'Only ' . $this->product->quantity . ' Quantity Available';
                        $type = 'warning';
                        $status = 404;
                    } else {
                        if (Cart::where([
                            'user_id' => auth()->user()->id,
                            'product_id' => $this->productId
                        ])) {
                            $message = 'Product Already Added to cart';
                            $type = 'warning';
                            $status = 200;
                        } else {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $this->productId,
                                'product_color_id' => $this->colorId,
                                'quantity' => $this->quantityCount
                            ]);
                            $message = 'Product Added to cart Successfuly';
                            $type = 'success';
                            $status = 200;
                        }
                    }
                } else {
                    $message = 'Out of stock';
                    $type = 'warning';
                    $status = 404;
                }
            } else {
                $message = 'Product does not exists';
                $type = 'warning';
                $status = 404;
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

    public function render()
    {
        return view('livewire.frontend.product.action', [
            'product' => $this->product
        ]);
    }
}
