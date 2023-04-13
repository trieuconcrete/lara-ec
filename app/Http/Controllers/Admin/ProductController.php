<?php

namespace App\Http\Controllers\Admin;

use App\Constants;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductVariantRequest;

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

    public function save(Request $request)
    {
        try {
            $category = Category::findOrFail($request->category_id);
            $data = [
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id ?? null,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'small_description' => $request->small_description ?? null,
                'description' => $request->description ?? null,
                'original_price' => $request->original_price ?? null,
                'selling_price' => $request->selling_price ?? null,
                'discount' => $request->discount ?? null,
                'quantity' => $request->quantity ?? null,
                'meta_title' => $request->meta_title ?? null,
                'meta_keyword' => $request->meta_keyword ?? null,
                'meta_description' => $request->meta_description ?? null,
                'status' => $request->status ?? null,
                'trending' => $request->trending ?? null,
                'featured' => $request->featured ?? null
            ];
            // store main_image
            $path = 'uploads/product/';
            if ($request->hasFile('main_image')) {
                $data['main_image'] = $path . $this->uploadImage($path, $request->file('main_image'), true);
            }

            // insert product
            $product = $category->products()->create($data);
            
            // insert product images
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $file) {
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $path . $this->uploadImage($path, $file)
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
        $product = Product::with('productImages', 'productVariants')->findOrFail($id);

        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        try {
            $product = Product::where('id', $product_id)->first();
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
                    'discount' => $request->discount ?? null,
                    'quantity' => $request->quantity ?? null,
                    'meta_title' => $request->meta_title ?? null,
                    'meta_keyword' => $request->meta_keyword ?? null,
                    'meta_description' => $request->meta_description ?? null,
                    'status' => $request->status ?? null,
                    'trending' => $request->trending ?? null,
                    'featured' => $request->featured ?? null
                ];
                // store file
                $path = 'uploads/product/';
                if ($request->hasFile('main_image')) {
                    $data['main_image'] = $path . $this->uploadImage($path, $request->file('main_image'), $product->main_image, true);
                }

                $product->update($data);
                // upload product images
                if ($request->hasFile('product_images')) {
                    foreach ($request->file('product_images') as $file) {
                        $product->productImages()->create([
                            'product_id' => $product_id,
                            'image' => $path . $this->uploadImage($path, $file)
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

    public function updateQuantity(Request $request, $productVariantId)
    {
        $productVariant = Product::findOrFail($request->product_id)->productVariants()->where('id', $productVariantId)->first();
        $productVariant->update(['quantity' => $request->qty]);
        return response()->json(['message' => 'Product Color Qty Updated Successfuly!']);
    }

    public function deleteColor(Request $request, $productVariantId)
    {
        $productVariant = Product::findOrFail($request->product_id)->productVariants()->where('id', $productVariantId)->first();
        $productVariant->delete();
        return response()->json(['message' => 'Product Color Qty Deleted Successfuly!']);
    }

    public function updateproductVariants(ProductVariantRequest $request, $product)
    {
        try {
            foreach ($request->datas as $key => $value) {
                // define data
                $data = [
                    'product_id' => $product,
                    'color_id' => $request->colors[$key],
                    'size' => $request->sizes[$key] ?? null,
                    'quantity' => $request->quantitys[$key] ?? null,
                    'price' => $request->prices[$key] ?? null
                ];
                // upload image
                $path = 'uploads/product/product_variants/';
                $file =  $request->images[$key] ?? null;
                if ($file) {
                    $data['image'] = $this->uploadImage($path, $file);
                }
                if ($value == 'insert') {
                    if (!ProductVariant::where([
                        'product_id' => $product,
                        'color_id' => $request->colors[$key],
                        'size' => $request->sizes[$key] ?? null,
                    ])->exists()) {
                        ProductVariant::create($data);
                    }
                }
                if ($value == 'update') {
                    ProductVariant::where('id', $key)->update($data);
                }
            }
            return redirect()->back()->with('message', 'Product Option Value Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>" . $e->getMessage());
        }
    }
}
