<?php

namespace App\Http\Livewire\Frontend\Mypage;

use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListCount extends Component
{

    public $wishListCount;
    protected $listeners = ['wishListAddedUpdate' => 'checkWishListCount'];


    public function checkWishListCount()
    {
        $wishlist = session()->get('wishlist');
        $this->wishListCount = $wishlist ? count($wishlist) : 0;
        return $this->wishListCount;
    }

    public function render()
    {
        $this->wishListCount = $this->checkWishListCount();
        return view('livewire.frontend.mypage.wish-list-count', [
            'wishListCount' => $this->wishListCount
        ]);
    }
}
