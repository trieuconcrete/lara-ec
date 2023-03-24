<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class RelatedProduct extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.related-product', [
            'product' => $this->product
        ]);
    }
}
