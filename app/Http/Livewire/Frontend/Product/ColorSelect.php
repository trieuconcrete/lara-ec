<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class ColorSelect extends Component
{

    public $product, $colorId, $productColorQtyCheck = true;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function colorSelected($colorId)
    {
        $this->productColorQtyCheck = true;
        $this->colorId = $colorId;
        $productColor = $this->product->productColors()->where('color_id', $this->colorId)->first();
        $productColorQty = $productColor->quantity;
        if (!$productColorQty) {
            $this->productColorQtyCheck = false;
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.color-select', [
            'product' => $this->product
        ]);
    }
}
