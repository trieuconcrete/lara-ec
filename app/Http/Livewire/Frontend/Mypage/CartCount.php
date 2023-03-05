<?php

namespace App\Http\Livewire\Frontend\Mypage;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount, $cartList;
    protected $listeners = ['cartAddedUpdate' => 'checkCartCount'];


    public function checkCartCount()
    {
        if (Auth::check()) {
            $this->cartList = Cart::with('product', 'product.productImages')->where('user_id', auth()->user()->id)->get();
            $this->cartCount = $this->cartList->count();
        } else {
            $this->cartCount = 0;
        }
        return $this->cartCount;
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.mypage.cart-count', [
            'cartCount' => $this->cartCount,
            'carts' => $this->cartList
        ]);
    }
}
