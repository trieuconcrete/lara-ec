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

    public $productId, $category, $brandInputs = [], $sortPrice, $priceFrom = 100, $priceTo = 500, $keyword, $perPage = 18, $page = 1;
    protected $products, $brands, $listeners = ['productListSearch' => 'searchProduct'];

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'category' => ['except' => '', 'as' => 'category'],
        'keyword' => ['except' => '', 'as' => 'keyword'],
        'page' => ['except' => 1],
        'perPage' => ['except' => 18, 'as' => 'per_page']
    ];

    public function searchProduct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function updatePerPage18()
    {
        $this->perPage = 18;
    }

    public function updatePerPage50()
    {
        $this->perPage = 50;
    }

    public function updatePerPage100()
    {
        $this->perPage = 100;
    }

    public function sortPriceASC()
    {
        $this->sortPrice('ASC');
    }

    public function sortPriceDESC()
    {
        $this->sortPrice('DESC');
    }

    public function sortPrice($order)
    {
        $this->sortPrice = $order;
        $this->queryString = array_merge([
            'sortPrice' => ['except' => '', 'as' => 'sort_price']
        ], $this->queryString);
    }

    public function filterProduct()
    {
        $this->queryString = array_merge([
            'priceFrom' => ['except' => '', 'as' => 'from_price'],
            'priceTo' => ['except' => '', 'as' => 'to_price']
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
        $this->keyword = is_array($this->keyword) ? implode(' ', $this->keyword) : $this->keyword;
        $this->brandInputs = !is_array($this->brandInputs) ? [] : $this->brandInputs;
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
        })->paginate($this->perPage);
        $this->brands = Brand::where('status', 1)->get();
        $new_products = Product::with('productImages')->where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'brands' => $this->brands,
            'new_products' => $new_products
        ]);
    }
}
