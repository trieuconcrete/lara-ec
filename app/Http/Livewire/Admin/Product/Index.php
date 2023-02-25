<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $productId;

    public function render()
    {
        $products = Product::with('category', 'brand')->orderBy('updated_at', 'DESC')->paginate(10);
        return view('livewire.admin.product.index', ['products' => $products]);
    }

    public function deleteProduct($id)
    {
        $this->productId = $id;
    }

    public function destroyProduct()
    {
        $product = Product::find($this->productId);
        if ($product->productImages()) {
            foreach ($product->productImages as $image) {
                if(Storage::exists($image->image)) {
                    Storage::delete($image->image);
                }
                $image->delete();
            }
        }
        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }
}
