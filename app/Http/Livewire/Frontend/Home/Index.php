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
        $this->sliders = Slider::where('status', 1)->get();
        $this->brands = Brand::where('status', 1)->get();
        $query = Product::with('productImages', 'category')->where('status', 1);
        $this->products = $query->where('trending', 1)->latest()->take(8)->get();
        $this->productNewArrivals = $query->latest()->take(12)->get();

        return view('livewire.frontend.home.index', [
            'sliders' => $this->sliders,
            'brands' => $this->brands,
            'products' => $this->products,
            'productNewArrivals' => $this->productNewArrivals
        ]);
    }
}
