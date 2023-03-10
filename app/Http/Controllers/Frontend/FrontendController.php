<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    /**
     * Show the homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $query = Product::with('productImages', 'category')->where('status', 1);
        $products = $query->where('trending', 1)->latest()->take(8)->get();
        $productNewArrivals = $query->latest()->take(12)->get();
        return view('frontend.index', compact('sliders', 'brands', 'products', 'productNewArrivals'));
    }

    /**
     * Show the production detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductDetail($id)
    {
        $product = Product::with('productImages', 'productColors')->find($id);
        return view('frontend.product_detail', compact('product'));
    }

    /**
     * Show the production list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductList()
    {
        return view('frontend.product_list');
    }
}
