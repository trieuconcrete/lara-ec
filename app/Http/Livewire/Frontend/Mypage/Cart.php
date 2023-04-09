<?php

namespace App\Http\Livewire\Frontend\Mypage;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\ProductVariant;

class Cart extends Component
{
    public $cartId;

    public function incrementQuantity($cartId)
    {
        $this->cartId = $cartId;
        $cart = CartModel::where([
            'id' => $cartId,
            'user_id' => auth()->user()->id,
        ])->first();
        if($cart) {
            $productVariant = $cart->productVariant()->where('id', $cart->product_variant_id);
            if ($productVariant->exists()) {
                // check product color quantity
                $quantityAllow = $productVariant->quantity;
                if ($productVariant->quantity >  $cart->quantity) {
                    $cart->increment('quantity');
                    $message = 'Quatity updated successfully';
                    $type = 'success';
                    $status = 200;
                    $this->emit('cartAddedUpdate');
                } else {
                    $message = 'Only ' . $quantityAllow . ' Quantity Available';
                    $type = 'warning';
                    $status = 200;
                }
            } else {
                $quantityAllow = $cart->product->quantity;
                if ($cart->product->quantity > $cart->quantity) {
                    $cart->increment('quantity');
                    $message = 'Quatity updated successfully';
                    $type = 'success';
                    $status = 200;
                    $this->emit('cartAddedUpdate');
                } else {
                    $message = 'Only ' . $quantityAllow . ' Quantity Available';
                    $type = 'warning';
                    $status = 200;
                }
            }
        } else {
            $message = 'Something went wrong';
            $type = 'error';
            $status = 200;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function decrementQuantity($cartId)
    {
        $this->cartId = $cartId;
        $cart = CartModel::where([
            'id' => $cartId,
            'user_id' => auth()->user()->id,
        ])->first();
        if($cart) {
            if ($cart->quantity > 1) {
                $cart->decrement('quantity');
                $message = 'Quatity updated successfully';
                $type = 'success';
                $status = 200;
                $this->emit('cartAddedUpdate');
            } else {
                $message = 'Quantity Cant less than 1';
                $type = 'warning';
                $status = 200;
            }
        } else {
            $message = 'Something went wrong';
            $type = 'error';
            $status = 200;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function removeCartItem($cartId)
    {
        $this->cartId = $cartId;
        if (CartModel::where('id', $this->cartId)->delete()) {
            $this->emit('cartAddedUpdate');
            $message = 'Cart item removed successfully';
            $this->dispatchBrowserEvent('message', [
                'text' => $message,
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $message = 'Something went wrong';
            $this->dispatchBrowserEvent('message', [
                'text' => $message,
                'type' => 'warning',
                'status' => 404
            ]);
        }
    }

    public function render()
    {
        $carts = session()->get('cart');
        return view('livewire.frontend.mypage.cart', [
            'carts' => $carts
        ]);
    }
}
