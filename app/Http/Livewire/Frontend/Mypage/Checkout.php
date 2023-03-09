<?php

namespace App\Http\Livewire\Frontend\Mypage;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Checkout extends Component
{

    public $carts, $first_name, $last_name, $billing_address, $billing_address2, $city, $country, $zipcode, $phone, $email, $status_message, $notes, $payment_mode, $payment_id = NULL;

    protected $listeners = ['validationForAll', 'createOrder', 'createOrderVNPay', 'transactionEmit' => 'paidOnlineOrder'];

    public function validationForAll()
    {
        $this->validate();
    }

    public function paidOnlineOrder($transId)
    {
        $this->payment_id = $transId;
        $this->payment_mode = 'Paid By Paypal';
        $this->createOrder();
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'zipcode' => 'required|string',
            'billing_address' => 'required|string'
        ];
    }

    public function placeOrder()
    {
        try {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'tracking_no' => Str::random(12),
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'billing_address' => $this->billing_address,
                'billing_address2' => $this->billing_address2,
                'zipcode' => $this->zipcode,
                'city' => $this->city,
                'country' => $this->country,
                'notes' => $this->notes,
                'status_message' => 'in progress',
                'payment_mode' => $this->payment_mode,
                'payment_id' => $this->payment_id
            ]);
            $orderItemsData = [];
            foreach($this->carts as $item) {
                $orderItemsData = [
                    'product_id' => $item->product_id,
                    'product_color_id' => $item->product_color_id ?? null,
                    'quantity' => $item->quantity,
                    'price' => $item->product->selling_price
                ];
                // create order items
                $order->orderItems()->create($orderItemsData);
                // update quantity in stock
                if ($item->product_color_id !== null) {
                    $item->productColors()->where('id', $item->product_color_id)->decrement('quantity', $item->quantity);
                } else {
                    $item->product()->where('id', $item->product_id)->decrement('quantity', $item->quantity);
                }
            }
            
            return $order;
        } catch(\Exception $e) {
            return false;
        }
    }

    // Cash On Delivery
    public function codOrder()
    {
        $this->validate();
        $this->payment_mode = 'Cash On Delivery';
        $this->createOrder();
    }

    public function createOrder()
    {
        DB::beginTransaction();
        $order = $this->placeOrder();
        if ($order) {
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            DB::commit();
            return redirect()->to('mypage/thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went error',
                'type' => 'error',
                'status' => 500
            ]);
            DB::rollBack();
        }
    }

    public function render()
    {
        $this->email = auth()->user()->email;
        $this->carts = Cart::with('product', 'product.productImages')->where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.mypage.checkout', [
            'carts' => $this->carts,
            'email' => $this->email,
        ]);
    }

    public function createOrderVNPay()
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/mypage/return-vnpay";
        $vnp_TmnCode = "BGNJM6I7";//Mã website tại VNPAY 
        $vnp_HashSecret = "WLGKVSBLSKIAHNXNOIZUZPVMHKRRKYBZ"; //Chuỗi bí mật

        $vnp_TxnRef = "1234"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Nap tien cho thue bao 0123456789";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = 1000000 * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = Carbon::now()->addDay()->format('YmdHis');
        //Billing
        $vnp_Bill_Mobile = "1111";
        $vnp_Bill_Email = "test@gmail.com";
        $fullName = "Name test xxxx";
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address="Viet Nam";
        $vnp_Bill_City="Ha Noi";
        $vnp_Bill_Country="Viet Nam";
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // Invoice
        $vnp_Inv_Phone="0905000000";
        $vnp_Inv_Email="test_02@gmail.com";
        $vnp_Inv_Customer="tesst xxxxx";
        $vnp_Inv_Address="Viet Nam";
        $vnp_Inv_Company="Tesst";
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "vnd",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
            "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            "vnp_Bill_Email"=>$vnp_Bill_Email,
            "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            "vnp_Bill_Address"=>$vnp_Bill_Address,
            "vnp_Bill_City"=>$vnp_Bill_City,
            "vnp_Bill_Country"=>$vnp_Bill_Country,
            "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            "vnp_Inv_Email"=>$vnp_Inv_Email,
            "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            "vnp_Inv_Address"=>$vnp_Inv_Address,
            "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        dd($vnp_Url);
        return redirect($vnp_Url);
	// vui lòng tham khảo thêm tại code demo
    }

}
