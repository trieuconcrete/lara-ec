<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $orders = Order::with('orderItems')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.order.index', [
            'orders' => $orders
        ]);
    }
}
