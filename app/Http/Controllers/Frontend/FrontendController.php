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
        return view('frontend.index');
    }

    /**
     * Show the production detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductDetail($id)
    {
        $product = Product::with('category', 'productImages', 'productColors', 'productReviews')->withCount('productReviews')
        ->with(['category.products' => function($query) use ($id) {
            return $query->where('id', '<>', $id)->limit(8);
        }])->find($id);
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
