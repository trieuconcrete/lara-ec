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
    public function getProductDetail($slug)
    {
        try {
            $product = Product::with('category', 'productVariants.color', 'productImages', 'productReviews', 'productReviews.user', 'productReviews.user.userDetail')
                ->withCount('productReviews as review_count')
                ->withAvg(['productReviews as product_rating' => fn($query) => $query->where('point', '<>', 0)], 'point')
                ->with(['category.products' => function($query) use ($slug) {
                    return $query->with('productImages')
                    ->where('slug', '<>', $slug)->limit(8);
                }])
                ->with(['productVariants' => function($query) {
                    return $query->where('quantity', '>', 0);
                }])
                ->where('slug', $slug)->first();
            return view('frontend.product_detail', compact('product'));
        } catch(\Exception $e) {
            abort(404);
        }
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
