<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        return view('admin.product.create', ['categories' => $categories, 'brands' => $brands]);
    }

    public function save(ProductFormRequest $request)
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
                $path = 'uploads/product';
                foreach ($request->file('product_images') as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $filename = time().'.'.$ext;
                    $file->storeAs($path, $filename);
                    $imagePath = $path.'/'.$filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $imagePath
                    ]);
                }
            }

            return redirect(route('admin.product.index'))->with('message', 'Product Added Successfully!');
        } catch(\Exception $e) {
            return redirect(route('admin.product.create'))->with('error', "Oops an error occurred!</br>Errors:".$e->getMessage());
        }
    }

    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        $product = Product::with('productImages')->findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
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

                if ($request->hasFile('product_images')) {
                    $path = 'uploads/product';
                    foreach ($request->file('product_images') as $file) {
                        $ext = $file->getClientOriginalExtension();
                        $filename = time().'.'.$ext;
                        $file->storeAs($path, $filename);
                        $imagePath = $path.'/'.$filename;
                        
                        $product->productImages()->create([
                            'product_id' => $product_id,
                            'image' => $imagePath
                        ]);
                    }
                }
            } else {
                return redirect()->back()->with('error', "Product not found!");
            }
            return redirect(route('admin.product.index'))->with('message', 'Product Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }

    public function removeImage($image_id)
    {
        $productImage = ProductImage::find($image_id);
        $fileStoragePath = 'storage/'.$productImage->image;
        if(File::exists($fileStoragePath)) {
            File::delete($fileStoragePath);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted Successfully!');
    }
}
