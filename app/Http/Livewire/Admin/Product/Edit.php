<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductOptionValue;
use App\Constants;

class Edit extends Component
{
    public $product, $colors, $sizes, $quantitys, $prices, $images;
    public $inputs = [];
    public $row = 1;
    public $productOptionValueId;

    public function mount($product)
    {
        $this->product = $product;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addRow($row)
    {
        $row = $row + 1;
        $this->row = $row;
        array_push($this->inputs ,$row);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeRow($row)
    {
        unset($this->inputs[$row]);
    }

    public function deleteProductOption($productOptionValueId)
    {
        $this->productOptionValueId = $productOptionValueId;
    }

    public function removeProductOption()
    {
        ProductOptionValue::findOrFail($this->productOptionValueId)->delete();
        $this->dispatchBrowserEvent('message', [
            'text' => 'Deleted Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $colorList = Color::select('id', 'name', 'code')->get();
        $sizeList = Constants::PRODUCT_SIZES;
        $productOptionValues = Product::with('productImages', 'productColors', 'productOptionValues')->findOrFail($this->product->id)->productOptionValues;
        return view('livewire.admin.product.edit', [
            'productOptionValues' => $productOptionValues,
            'colorList' => $colorList,
            'sizeList' => $sizeList
        ]);
    }
}
