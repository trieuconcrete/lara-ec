<?php

namespace App\Services\FrontEnd;

use App\Models\Order;
use App\Models\Cart;
use App\Constants;

class OrderService
{
    public function __construct()
    {
        //
    }

    /**
     * complate process order vnpay
     * @param $params
     * @return boolean
     */
    public function complateProcessOrderVNPay($params)
    {
        // check vnpay ok
        if($params['vnp_ResponseCode'] == Constants::VNPAY_STATUS_CODE_OK) {
            // delete cart
            Cart::where('user_id', auth()->user()->id)->delete();

            return true;
        }

        // find order by id
        $order = Order::with('orderItems')->where('id', (int) $params['vnp_TxnRef'])->first();

        // check order was exist
        if ($order) {
            // delete order items
            $order->orderItems()->delete();
            // delete order
            $order->delete();
        }

        return false;
    }
}
