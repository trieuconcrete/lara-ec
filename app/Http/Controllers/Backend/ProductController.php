<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.products.index');
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function save(Request $request)
    {
        try {
            // $category = Category::findOrFail($request->category_id);
            // $data = [
            //     'name' => $request->name,
            //     'category_id' => $request->category_id,
            //     'brand_id' => $request->brand_id ?? null,
            //     'small_description' => $request->small_description ?? null,
            //     'description' => $request->description ?? null,
            //     'original_price' => $request->original_price ?? null,
            //     'selling_price' => $request->selling_price ?? null,
            //     'discount' => $request->discount ?? null,
            //     'quantity' => $request->quantity ?? null,
            //     'meta_title' => $request->meta_title ?? null,
            //     'meta_keyword' => $request->meta_keyword ?? null,
            //     'meta_description' => $request->meta_description ?? null,
            //     'status' => $request->status ?? null,
            //     'trending' => $request->trending ?? null,
            //     'featured' => $request->featured ?? null
            // ];
            // // insert product
            // $product = $category->products()->create($data);
            // // insert product images
            // if ($request->hasFile('product_images')) {
            //     $path = 'uploads/product/';
            //     foreach ($request->file('product_images') as $file) {
            //         $product->productImages()->create([
            //             'product_id' => $product->id,
            //             'image' => $this->uploadImage($path, $file)
            //         ]);
            //     }
            // }
            return redirect()->back()->withInput()->with('success', 'Product Added Successfully!');
            // return redirect(route('admin.product.index'))->back()->with('success', 'Product Added Successfully!');
        } catch (\Exception $e) {
            return redirect(route('admin.product.create'))->with('error', "Oops an error occurred!</br>Errors:" . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        $product = Product::with('productImages', 'productVariants')->findOrFail($id);

        return view('backend.products.edit', compact('product', 'categories', 'brands'));
    }
}
