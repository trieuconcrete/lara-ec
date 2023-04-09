<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Constants;
use App\Models\Cart;
use App\Models\Color;
use App\Models\ProductVariant;
use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

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

    public function addToCart($productId)
    {
        $this->productId = $productId;
        if ($product = $this->product->where('id', $this->productId)->where('status', 1)->first()) {
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
            // check product variant & quantity
            $productVariant = ProductVariant::where([
                'product_id' => $this->productId,
                'color_id' => $this->colorId,
                'size' => $this->size
            ])->first();
            if ($productVariant && $productVariant->quantity > 0) {
                if ($productVariant->quantity < $this->quantityCount) {
                    $message = 'Only ' . $this->product->quantity . ' Quantity Available';
                    $type = 'warning';
                    $status = 404;
                } else {
                    $cart = session()->get('cart');
                    if(isset($cart[$productVariant->id])) {
                        $quantity = $cart[$productVariant->id]['quantity'] + $this->quantityCount;
                        $cart[$productVariant->id]['quantity'] = $quantity;
                        $cart[$productVariant->id]['sub_total'] = $productVariant->price * $quantity;
                        $cart[$productVariant->id]['image'] = $product->getImage();
                    } else {
                        $cart[$productVariant->id] = [
                            'product_id' => $this->productId,
                            'product_variant_id' => $productVariant->id,
                            'quantity' => $this->quantityCount,
                            'price' => $productVariant->price,
                            'sub_total' => $productVariant->price * $this->quantityCount,
                            'image' => $product->getImage(),
                            'name' => $product->name,
                            'slug' => $product->slug
                        ];
                        session()->put('cart', $cart);
                    }
                    $message = 'Product Added to cart Successfuly';
                    $type = 'success';
                    $status = 200;
                    $this->emit('cartAddedUpdate');
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
        
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function render()
    {
        $colors = $this->product->getColors();
        $sizes = $this->product->getSizes()->toArray();
        return view('livewire.frontend.product.action', [
            'product' => $this->product,
            'colors' => $colors,
            'sizes' => $sizes ? Arr::sort($sizes) : []
        ]);
    }
}
