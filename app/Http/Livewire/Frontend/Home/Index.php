<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\WishList;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $productId, $sliders, $brands, $products, $productNewArrivals;

    public function addToWishList2($productId)
    {
        $this->addToWishList($productId);
    }
    public function addToWishList($productId)
    {
        $this->productId = $productId;
        $wishlist = session()->get('wishlist');
        if(isset($wishlist[$this->productId])) {
            $message = 'Already Added to wishlist';
            $type = 'warning';
            $status = 200;
        } else {
            $wishlist[$this->productId] = $this->productId;
            session()->put('wishlist', $wishlist);
            $this->emit('wishListAddedUpdate');
            $message = 'Wishlist Added Successfuly';
            $type = 'success';
            $status = 200;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }
    public function render()
    {
        $seconds = 360;
        $query = Product::with('productImages', 'category')->where('status', 1);
    
        $this->products = Cache::remember('products', $seconds, function () use ($query) {
            return $query->where('trending', 1)->latest()->take(8)->get()->toArray();
        });

        $this->productNewArrivals = Cache::remember('product_new_arrivals', $seconds, function () use ($query) {
            return $query->latest()->take(12)->get();
        });

        $this->sliders = Cache::remember('sliders', $seconds, function () {
            return Slider::where('status', 1)->get();
        });

        $this->brands = Cache::remember('brands', $seconds, function () {
            return Brand::where('status', 1)->get();
        });

        return view('livewire.frontend.home.index', [
            'sliders' => $this->sliders,
            'brands' => $this->brands,
            'products' => $this->products,
            'productNewArrivals' => $this->productNewArrivals
        ]);
    }
}
