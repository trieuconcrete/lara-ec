<?php

namespace App\Http\Livewire\Frontend\Mypage;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{

    public $carts, $first_name, $last_name, $billing_address, $billing_address2, $city, $country, $zipcode, $phone, $email, $status_message, $notes, $payment_mode, $payment_id = NULL;

    protected $listeners = ['validationForAll'];

    public function validationForAll()
    {
        $this->validate();
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

    public function createOrder()
    {
        $this->validate();
        DB::beginTransaction();
        $this->payment_mode = 'Cash On Delivery';
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
}
