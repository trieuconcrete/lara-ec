<?php

namespace App\Http\Livewire\Frontend\Mypage;

use Livewire\Component;
use App\Models\WishList as WishListModel;
use App\Models\Product;

class WishList extends Component
{
    public $wishlistId;

    public function removeWishlist($wishlistId)
    {
        $this->wishlistId = $wishlistId;
        $wishlist = session()->get('wishlist');
        if(isset($wishlist[$this->wishlistId])) {
            unset($wishlist[$this->wishlistId]);
            session()->put('wishlist', $wishlist);
        }

        $this->emit('wishListAddedUpdate');
        $message = 'Wishlist item removed successfully';
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function removeAllWishlist()
    {
        session()->pull('wishlist', 'default');
        $this->emit('wishListAddedUpdate');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist removed all successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $wishlist = session()->get('wishlist');
        $products = $wishlist ? Product::whereIn('id', array_values($wishlist))->where('status', 1)->get() : [];
        return view('livewire.frontend.mypage.wish-list', [
            'products' => $products
        ]);
    }
}
