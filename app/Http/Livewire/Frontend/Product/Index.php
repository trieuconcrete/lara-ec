<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\WishList;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $productId, $category, $brandInputs = [], $sortPrice, $priceFrom = 100, $priceTo = 500, $keyword;
    protected $products, $brands, $listeners = ['productListSearch' => 'searchProduct'];

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'category' => ['except' => '', 'as' => 'category'],
        'keyword' => ['except' => '', 'as' => 'keyword']
    ];

    public function searchProduct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function sortBy($sortPrice)
    {
        $this->sortPrice = $sortPrice;
        $this->queryString = array_merge([
            'sortPrice' => ['except' => '', 'as' => 'price-sort']
        ], $this->queryString);
    }

    public function filterProduct()
    {
        $this->queryString = array_merge([
            'priceFrom' => ['except' => '', 'as' => 'price-from'],
            'priceTo' => ['except' => '', 'as' => 'price-to']
        ], $this->queryString);
    }

    public function addToWishList($productId)
    {
        $this->productId = $productId;
        if (Auth::check()) {
            if (WishList::where([
                'user_id' => auth()->user()->id,
                'product_id' => $this->productId
            ])->exists()) {
                $message = 'Already Added to wishlist';
                $type = 'warning';
                $status = 200;
            } else {
                $wishlist = WishList::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->productId
                ]);
                $this->emit('wishListAddedUpdate');
                $message = 'Wishlist Added Successfuly';
                $type = 'success';
                $status = 200;
            }
        } else {
            $message = 'Please login to continue';
            $type = 'message';
            $status = 401;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function render()
    {
        $this->products = Product::with('productImages', 'category', 'brand')
        ->when($this->keyword, function($query) {
            $query->where('name', 'like', '%'.$this->keyword.'%')
            ->orWhere('product_code', 'like', '%'.$this->keyword.'%');
        })
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
        })->paginate(18);
        $this->brands = Brand::where('status', 1)->get();
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'brands' => $this->brands
        ]);
    }
}
