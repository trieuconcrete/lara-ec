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
        "vnp_ReturnUrl" => env('APP_URL')."/mypage/return-vnpay"
    ];
    public const VNPAY_STATUS_CODE_OK = "00";

    public const PROJECT_STATUS = [
        '1' => 'Opening',
        '2' => 'In Progress',
        '3' => 'Completed',
        '4' => 'Closed',
        '5' => 'Pending',
        '99' => 'Other'
    ];

    public const PRODUCT_SIZES = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL'];

    public const PROJECT_TYPE = [
        '1' => 'Outsource',
        '2' => 'Mainten',
        '3' => 'Lab',
        '4' => 'Internal',
        '5' => 'Common',
        '99' => 'Other'
    ];
}
