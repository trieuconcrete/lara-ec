<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Detail extends Component
{

    // protected $product;
    public $product, $colorId, $productQuantity = 1, $productColorQtyCheck = true;

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

    public function mount($product)
    {
        $this->product = $product;
    }

    public function productQty($option)
    {
        if ($option == 'down') {
            $this->productQuantity -= $this->productQuantity;
        }
        if ($option == 'up') {
            $this->productQuantity += $this->productQuantity;
        }
    }
    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'product' => $this->product
        ]);
    }
}
