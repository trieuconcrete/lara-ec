<?php

namespace App\Http\Livewire\Frontend\Mypage;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Constants;

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
        $order = $this->placeOrder();
        $vnpAmount = $order->orderItems->sum('price') * 100;
        $vnp_Url = Constants::VNPAY_URL;
        $vnp_HashSecret = Constants::VNPAY_HASHSECRET;
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = Carbon::now()->addMinutes(Constants::VNPAY_TIMEOUT_EXPIRE)->format('YmdHis');
        $inputData = array_merge(Constants::VNPAY, [
            "vnp_Amount" => (int) $vnpAmount,
            "vnp_OrderInfo" => Constants::VNPAY_ORDER_INFOR . $order->id,
            "vnp_TxnRef" => $order->id,
            // "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_IpAddr" => request()->ip(),
        ]);

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

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
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
	// vui lòng tham khảo thêm tại code demo
    }

}
