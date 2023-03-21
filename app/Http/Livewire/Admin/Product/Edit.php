<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Color;
use App\Models\Product;
use App\Constants;

class Edit extends Component
{
    public $product, $colors, $sizes, $quantitys, $prices, $images;
    public $inputs = [];
    public $row = 1;

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

    public function render()
    {
        $colorList = Color::select('id', 'name', 'code')->get();
        $sizeList = Constants::PRODUCT_SIZES;
        return view('livewire.admin.product.edit', [
            'product' => $this->product,
            'colorList' => $colorList,
            'sizeList' => $sizeList
        ]);
    }
}
