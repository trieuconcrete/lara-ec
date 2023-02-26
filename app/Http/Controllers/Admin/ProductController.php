<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductImage;
use App\Models\ProductColor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends BaseController
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        $colors = Color::select('id', 'name', 'code')->get();
        return view('admin.product.create', compact('categories', 'brands', 'colors'));
    }

    public function save(ProductFormRequest $request)
    {
        try {
            // dd($request->all());
            $category = Category::findOrFail($request->category_id);
            // dd($category);
            $data = [
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id ?? null,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'small_description' => $request->small_description ?? null,
                'description' => $request->description ?? null,
                'original_price' => $request->original_price ?? null,
                'selling_price' => $request->selling_price ?? null,
                'quantity' => $request->quantity ?? null,
                'meta_title' => $request->meta_title ?? null,
                'meta_keyword' => $request->meta_keyword ?? null,
                'meta_description' => $request->meta_description ?? null,
                'status' => $request->status ?? null,
                'trending' => $request->trending ?? null
            ];
            // insert product
            $product = $category->products()->create($data);
            // insert product images
            if ($request->hasFile('product_images')) {
                $path = 'uploads/product/';
                foreach ($request->file('product_images') as $file) {
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $this->uploadImage($path, $file)
                    ]);
                }
            }
            // insert product colors
            if ($request->product_colors) {
                foreach($request->product_colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->quantities[$key] ?? 0
                    ]);
                }
            }

            return redirect(route('admin.product.index'))->with('message', 'Product Added Successfully!');
        } catch (\Exception $e) {
            return redirect(route('admin.product.create'))->with('error', "Oops an error occurred!</br>Errors:" . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        $product = Product::with('productImages', 'productColors')->findOrFail($id);
        $productColors = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::select('id', 'name', 'code')->whereNotIn('id', $productColors)->get();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'colors', 'productColors'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        try {
            $product = Category::findOrFail($request->category_id)
                ->products()->where('id', $product_id)->first();
            if ($product) {
                $data = [
                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id ?? null,
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'small_description' => $request->small_description ?? null,
                    'description' => $request->description ?? null,
                    'original_price' => $request->original_price ?? null,
                    'selling_price' => $request->selling_price ?? null,
                    'quantity' => $request->quantity ?? null,
                    'meta_title' => $request->meta_title ?? null,
                    'meta_keyword' => $request->meta_keyword ?? null,
                    'meta_description' => $request->meta_description ?? null,
                    'status' => $request->status ?? null,
                    'trending' => $request->trending ?? null
                ];
                $product->update($data);
                // upload product images
                if ($request->hasFile('product_images')) {
                    $path = 'uploads/product/';
                    foreach ($request->file('product_images') as $file) {
                        $product->productImages()->create([
                            'product_id' => $product_id,
                            'image' => $this->uploadImage($path, $file)
                        ]);
                    }
                }
                // insert product colors
                if ($request->product_colors) {
                    foreach($request->product_colors as $key => $color) {
                        $product->productColors()->create([
                            'product_id' => $product->id,
                            'color_id' => $color,
                            'quantity' => $request->quantities[$key] ?? 0
                        ]);
                    }
                }
            } else {
                return redirect()->back()->with('error', "Product Not Found!");
            }
            return redirect(route('admin.product.index'))->with('message', 'Product Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>" . $e->getMessage());
        }
    }

    public function removeImage($image_id)
    {
        $productImage = ProductImage::find($image_id);
        if (Storage::exists($productImage->image)) {
            Storage::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted Successfully!');
    }

    public function updateQuantity(Request $request, $productColorId)
    {
        $productColor = Product::findOrFail($request->product_id)->productColors()->where('id', $productColorId)->first();
        $productColor->update(['quantity' => $request->qty]);
        return response()->json(['message' => 'Product Color Qty Updated Successfuly!']);
    }

    public function deleteColor(Request $request, $productColorId)
    {
        $productColor = Product::findOrFail($request->product_id)->productColors()->where('id', $productColorId)->first();
        $productColor->delete();
        return response()->json(['message' => 'Product Color Qty Deleted Successfuly!']);
    }
}
