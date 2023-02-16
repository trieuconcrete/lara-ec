<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFromRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function save(CategoryFromRequest $request)
    {
        $validateData = $request->validated();
        $category = new Category();
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $category->status == true ? 1: 0;

        // store file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->save();
        return redirect(route('admin.category.index'))->with('message', 'Category Added Successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFromRequest $request, $category)
    {
        $validateData = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $category->status == true ? 1: 0;

        // store file
        if ($request->hasFile('image')) {
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->update();

        return redirect(route('admin.category.index'))->with('message', 'Category Updated Successfully!');
    }
}
