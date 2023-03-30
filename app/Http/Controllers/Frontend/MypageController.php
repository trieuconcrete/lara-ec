<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants;
use App\Services\Frontend\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MypageController extends Controller
{
    protected $orderService;

    /**
     * OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

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

    /**
     * process complate vnpay
     */
    public function returnVnpay(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($this->orderService->complateProcessOrderVNPay($request->all())) {
                DB::commit();
                return redirect()->to('mypage/thank-you');
            }

            // case error
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went error',
                'type' => 'error',
                'status' => 500
            ]);
            DB::rollBack();
            return redirect()->to('mypage/cart');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order by VNPAY error: '. $e->getMessage());
            
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went error',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
}
