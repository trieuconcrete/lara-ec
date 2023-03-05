<?php

namespace App\Http\Livewire\Frontend\Mypage;

use Livewire\Component;
use App\Models\WishList as WishListModel;

class WishList extends Component
{
    public $wishlistId;

    public function removeWishlist($wishlistId)
    {
        $this->wishlistId = $wishlistId;
        WishListModel::where('id', $this->wishlistId)->delete();
        $this->emit('wishListAddedUpdate');
        $message = 'Wishlist item removed successfully';
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $wishlist = WishListModel::with('product', 'product.productImages')->where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.mypage.wish-list', [
            'wishlist' => $wishlist
        ]);
    }
}
