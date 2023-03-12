<?php

namespace App\Http\Livewire\Admin\Order;

use PDF;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $orderId, $order, $order_from, $order_to, $status_message, $order_status, $tracking_no;
    protected $orders, $queryString = [];

    public function searchOrder()
    {
        $this->queryString = array_merge([
            'order_from' => ['except' => ''],
            'order_to' => ['except' => ''],
            'status_message' => ['except' => '', 'as' => 'status'],
            'tracking_no' => ['except' => '']
        ], $this->queryString);
    }

    public function resetSearchForm()
    {
        $this->order_from = null;
        $this->order_to = null;
        $this->status_message = null;
        $this->queryString = array_merge([
            'order_from' => ['except' => ''],
            'order_to' => ['except' => ''],
            'status_message' => ['except' => '', 'as' => 'status'],
            'tracking_no' => ['except' => ''],
        ], $this->queryString);
    }

    public function updateOrderStatus($orderId)
    {
        Order::where('id', $orderId)->update(['status_message' => $this->order_status]);
        $this->dispatchBrowserEvent('message', [
            'text' => 'Order Status Updated Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function orderDetailModel($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('orderItems', 'orderItems.product')->where([
            'id' => $this->orderId,
            'user_id' => auth()->user()->id
        ])->first();
        $this->order_status =  $this->order->status_message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadOrder($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('orderItems', 'orderItems.product')->where([
            'id' => $this->orderId
        ])->first();
        $data = [
            'order' => $this->order
        ];
        $pdf = PDF::loadView('admin.order_detail', $data)->output();
    
        return response()->streamDownload(
            fn () => print($pdf),
            "order_detail_{$this->order->tracking_no}.pdf"
       );
    }

    public function sendInvoiceOrderMail($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('user', 'orderItems', 'orderItems.product')->where([
            'id' => $this->orderId
        ])->first();
        Mail::to($this->order->user->email)->send(new InvoiceOrderMailable($this->order));
        $this->dispatchBrowserEvent('message', [
            'text' => 'Send Invoice Order Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $this->orders = Order::with('orderItems')
        ->when($this->status_message, function($query) {
            $query->where('status_message', $this->status_message);
        })
        ->when($this->tracking_no, function($query) {
            $query->where('tracking_no', $this->tracking_no);
        })
        ->when($this->order_from, function($query) {
            $query->whereDate('created_at', '>=', $this->order_from);
        })
        ->when($this->order_to, function($query) {
            $query->whereDate('created_at', '<=', $this->order_to);
        })
        ->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.order.index', [
            'orders' => $this->orders
        ]);
    }
}
