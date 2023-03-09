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

    public function returnVnpay(\Request $request)
    {
        dd('ddd');
        // $url = session('url_prev','/');
        // if($request->vnp_ResponseCode == "00") {
        //     $this->apSer->thanhtoanonline(session('cost_id'));
        //     return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
        // }
        // session()->forget('url_prev');
        // return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
}
