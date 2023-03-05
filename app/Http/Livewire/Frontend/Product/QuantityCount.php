<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class QuantityCount extends Component
{
    public $quantityCount = 1;
    
    public function productQuantity($option)
    {
        if ($option == 'down' && $this->quantityCount > 1) {
            $this->quantityCount --;
        }
        if ($option == 'up') {
            $this->quantityCount ++;
        }
    }
    public function render()
    {
        return view('livewire.frontend.product.quantity-count');
    }
}
