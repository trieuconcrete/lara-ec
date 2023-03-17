<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


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

    public function searchProduct()
    {
        $this->queryString = array_merge([
            'status' => ['except' => '', 'as' => 'status'],
            'category' => ['except' => '', 'as' => 'category'],
            'brand' => ['except' => '', 'as' => 'brand'],
            'keyword' => ['except' => '', 'as' => 'keyword'],
        ], $this->queryString);
    }

    public function resetSearchForm()
    {
        $this->status = null;
        $this->category = null;
        $this->brand = null;
        $this->keyword = null;
        $this->queryString = array_merge([
            'status' => ['except' => '', 'as' => 'status'],
            'category' => ['except' => '', 'as' => 'category'],
            'brand' => ['except' => '', 'as' => 'brand'],
            'keyword' => ['except' => '', 'as' => 'keyword'],
        ], $this->queryString);
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

    public function render()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->brands = Brand::where('status', 1)->get();

        $this->products = Product::with('productImages', 'category', 'brand')
        ->when($this->keyword, function($query) {
            $query->where('name', 'like', '%'.$this->keyword.'%');
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
        return view('livewire.admin.product.index', [
            'products' => $this->products,
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }
}
