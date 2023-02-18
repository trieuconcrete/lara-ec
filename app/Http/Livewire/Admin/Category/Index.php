<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categoryId;

    public function deleteCategory($id)
    {
        $this->categoryId = $id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->categoryId);
        $path = 'storage/uploads/category/'.$category->image;
        if(File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Deleted successfully!');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
