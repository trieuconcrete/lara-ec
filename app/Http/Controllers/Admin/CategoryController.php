<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFromRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
        ->whereNull('parent_id')
        ->get();
        return view('admin.category.create', ['categories' => $categories]);
    }

    public function save(CategoryFromRequest $request)
    {
        $validateData = $request->validated();
        $category = new Category();

        $category->parent_id = $validateData['parent_id'];
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $validateData['status'] ?? 0;

        // store file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->storeAs('uploads/category', $filename);
            $category->image = $filename;
        }

        $category->save();
        return redirect(route('admin.category.index'))->with('message', 'Category Added Successfully!');
    }

    public function edit(Category $category)
    {
        $categories = Category::select('id', 'name')
        ->where('id', '<>', $category->id)
        ->whereNull('parent_id')
        ->get();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(CategoryFromRequest $request, $category)
    {
        $validateData = $request->validated();
        $category = Category::findOrFail($category);

        $category->parent_id = $validateData['parent_id'];
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $validateData['status'] ?? 0;

        // store file
        if ($request->hasFile('image')) {
            $path = 'storage/uploads/category/'.$category->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->storeAs('uploads/category', $filename);
            $category->image = $filename;
        }

        $category->update();

        return redirect(route('admin.category.index'))->with('message', 'Category Updated Successfully!');
    }
}
