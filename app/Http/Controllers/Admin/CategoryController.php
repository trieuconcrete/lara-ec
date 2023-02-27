<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFromRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepositoryInterface as CategoryRepository;

class CategoryController extends BaseController
{
    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

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
        try {
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
                $category->image = $this->uploadImage($path = 'uploads/category/', $request->file('image'));
            }

            $category->save();
            return redirect(route('admin.category.index'))->with('message', 'Category Added Successfully!');
        } catch(\Exception $e) {
            return redirect(route('admin.category.create'))->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
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
        try {
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
                $category->image = $this->uploadImage($path = 'uploads/category/', $request->file('image'), $category->image);
            }

            $category->update();
            return redirect(route('admin.category.index'))->with('message', 'Category Updated Successfully!');
        } catch(\Exception $e) {
            return redirect(route('admin.category.update'))->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }
}
