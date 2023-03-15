<?php

namespace App;

class Constants
{
    public const VNPAY_URL = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    public const VNPAY_TMN_CODE = "BGNJM6I7";
    public const VNPAY_HASHSECRET = "WLGKVSBLSKIAHNXNOIZUZPVMHKRRKYBZ";
    public const VNPAY_ORDER_INFOR = "Thanh toan hoa don #";
    public const VNPAY_TIMEOUT_EXPIRE = 10;
    public const VNPAY = [
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => "BGNJM6I7",
        "vnp_Command" => "pay",
        "vnp_CurrCode" => "VND",
        "vnp_Locale" => 'vn',
        "vnp_OrderType" => 200000,
        "vnp_ReturnUrl" => "http://localhost/mypage/return-vnpay",
    ];
    public const VNPAY_STATUS_CODE_OK = "00";
}
