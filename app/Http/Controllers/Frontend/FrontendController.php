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
        try {
            $product = Product::with('category', 'productVariants', 'productImages', 'productReviews', 'productReviews.user', 'productReviews.user.userDetail')
                ->withCount('productReviews as review_count')
                ->withAvg(['productReviews as product_rating' => fn($query) => $query->where('point', '<>', 0)], 'point')
                ->with(['category.products' => function($query) use ($id) {
                    return $query->with('productImages')
                    ->where('id', '<>', $id)->limit(8);
                }])->findOrFaild($id);
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
