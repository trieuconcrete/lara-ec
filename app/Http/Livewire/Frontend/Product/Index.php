<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category, $brandInputs = [], $sortPrice, $priceFrom = 100, $priceTo = 500;
    protected $products, $brands;
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'category' => ['except' => '', 'as' => 'category']
    ];

    public function sortBy($sortPrice)
    {
        $this->sortPrice = $sortPrice;
        $this->queryString = array_merge([
            'sortPrice' => ['except' => '', 'as' => 'price-sort']
        ], $this->queryString);
    }

    public function fillterProduct()
    {
        $this->queryString = array_merge([
            'priceFrom' => ['except' => '', 'as' => 'price-from'],
            'priceTo' => ['except' => '', 'as' => 'price-to'],
        ], $this->queryString);
    }

    public function render()
    {
        $this->products = Product::with('productImages', 'category', 'brand')
        ->when($this->brandInputs, function($q) {
            $q->whereIn('brand_id', $this->brandInputs);
        })
        ->when($this->sortPrice, function($q) {
            $q->orderBy('selling_price', $this->sortPrice);
        })
        ->when($this->category, function($query) {
            $query->whereHas('category', function($where) {
                $where->where('slug', $this->category);
            });
        })->paginate(12);
        $this->brands = Brand::where('status', 1)->get();
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'brands' => $this->brands
        ]);
    }
}
