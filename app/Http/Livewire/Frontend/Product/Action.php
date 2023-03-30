<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Constants;
use App\Models\Cart;
use App\Models\Color;
use App\Models\ProductVariant;
use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class Action extends Component
{
    public $product, $productId, $colorId, $size, $quantityCount = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function selectColor($colorId)
    {
        $this->colorId = $colorId;
    }

    public function selectSize($size)
    {
        $this->size = $size;
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
                if (!$this->colorId) {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Please select a Color!',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                    return ;
                }
                if (!$this->size) {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Please select a Size!',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                    return ;
                }
                // check product color & product quantity
                $productVariant = ProductVariant::where([
                    'product_id' => $this->productId,
                    'color_id' => $this->colorId,
                    'size' => $this->size,
                ])->first();
                if ($productVariant && $productVariant->quantity > 0) {
                    if ($productVariant->quantity < $this->quantityCount) {
                        $message = 'Only ' . $this->product->quantity . ' Quantity Available';
                        $type = 'warning';
                        $status = 404;
                    } else {
                        if (Cart::where([
                            'user_id' => auth()->user()->id,
                            'product_id' => $this->productId,
                            'product_variant_id' => $productVariant->id
                        ])->exists()) {
                            $message = 'Product Already Added to cart';
                            $type = 'warning';
                            $status = 200;
                        } else {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $this->productId,
                                'product_variant_id' => $productVariant->id,
                                'quantity' => $this->quantityCount
                            ]);
                            $message = 'Product Added to cart Successfuly';
                            $type = 'success';
                            $status = 200;
                            $this->emit('cartAddedUpdate');
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
        $colors = Color::get();
        $sizes = Constants::PRODUCT_SIZES;
        return view('livewire.frontend.product.action', [
            'product' => $this->product,
            'colors' => $colors,
            'sizes' => $sizes
        ]);
    }
}
