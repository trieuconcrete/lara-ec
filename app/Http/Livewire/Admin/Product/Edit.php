<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Constants;

class Edit extends Component
{
    public $product, $colors, $sizes, $quantitys, $prices, $images;
    public $inputs = [];
    public $row = 1;
    public $productVariantId;

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

    public function deleteProductOption($productVariantId)
    {
        $this->productVariantId = $productVariantId;
    }

    public function removeProductOption()
    {
        ProductVariant::findOrFail($this->productVariantId)->delete();
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
        $productVariants = Product::with('productImages', 'productVariants')->findOrFail($this->product->id)->productVariants;
        return view('livewire.admin.product.edit', [
            'productVariants' => $productVariants,
            'colorList' => $colorList,
            'sizeList' => $sizeList
        ]);
    }
}
