<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    /**
     * Show the wishlist.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function wishList()
    {
        return view('frontend.wishlist');
    }

    /**
     * Show the cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        return view('frontend.cart');
    }

    /**
     * Show the checkout.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {
        return view('frontend.checkout');
    }

    /**
     * Show the thankYou.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function thankYou()
    {
        return view('frontend.thank-you');
    }

    /**
     * Show the orders.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders()
    {
        return view('frontend.orders');
    }
}
