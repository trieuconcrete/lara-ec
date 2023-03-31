<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;

class SidebarWidget extends Component
{
    public function render()
    {
        $new_products = Product::with('productImages')->where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();
        return view('livewire.frontend.product.sidebar-widget', [
            'new_products' => $new_products
        ]);
    }
}
