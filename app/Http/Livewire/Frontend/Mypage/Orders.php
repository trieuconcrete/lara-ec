<?php

namespace App\Http\Livewire\Frontend\Mypage;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $orderId, $order;

    public function orderDetailModel($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('orderItems', 'orderItems.product')->where([
            'id' => $this->orderId,
            'user_id' => auth()->user()->id
        ])->first();
    }

    public function render()
    {
        $orders = Order::with('orderItems')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.frontend.mypage.orders', [
            'orders' => $orders
        ]);
    }
}
