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
        $categories = Category::select('id', 'name')->get();
        return view('admin.category.create', ['categories' => $categories]);
    }

    public function save(CategoryFromRequest $request)
    {
        try {
            $validateData = $request->validated();
            $category = new Category();

            $category->parent_id = $request->parent_id;
            $category->name = $request->name;
            $category->slug = Str::slug($request->slug);
            $category->description = $request->description;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;
            $category->status = $request->status ?? 0;
            // store file
            if ($request->hasFile('image')) {
                $path = 'uploads/category/';
                $category->image = $path . $this->uploadImage($path, $request->file('image'), true);
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
        ->get();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(CategoryFromRequest $request, $category)
    {
        try {
            $validateData = $request->validated();
            $category = Category::findOrFail($category);

            $category->parent_id = $request->parent_id;
            $category->name = $request->name;
            $category->slug = Str::slug($request->slug);
            $category->description = $request->description;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;
            $category->status = $request->status ?? 0;
            // store file
            if ($request->hasFile('image')) {
                $path = 'uploads/category/';
                $category->image = $path . $this->uploadImage($path, $request->file('image'), $category->image, true);
            }

            $category->update();
            return redirect(route('admin.category.index'))->with('message', 'Category Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }
}
