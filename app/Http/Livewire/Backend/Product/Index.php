<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $productId, $status = null, $categories, $category, $brand, $keyword;
    protected $products, $queryString = [];

    public function deleteProduct($id)
    {
        $this->productId = $id;
    }

    public function render()
    {
        // get product
        $this->products = Product::with('productImages', 'brand')
        ->withCount('orderItems')
        ->withAvg(['productReviews as product_rating' => fn($query) => $query->where('point', '<>', 0)], 'point')
        ->when($this->keyword, function($query) {
            $query->where('name', 'like', '%'.$this->keyword.'%')
            ->orWhere('product_code', 'like', '%'.$this->keyword.'%');
        })
        ->when(in_array($this->status, ['0', '1']), function($query) {
            $query->where('status', $this->status);
        })
        ->when($this->category, function($query) {
            $query->whereHas('category', function($where) {
                $where->where('slug', $this->category);
            });
        })
        ->when($this->brand, function($query) {
            $query->whereHas('brand', function($where) {
                $where->where('slug', $this->brand);
            });
        })
        ->orderBy('updated_at', 'DESC')->paginate(10);
        // render
        return view('livewire.backend.product.index', [
            'products' => $this->products,
        ]);
    }
}
