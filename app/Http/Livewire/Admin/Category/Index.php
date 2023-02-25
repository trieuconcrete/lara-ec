<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
        if(Storage::exists($category->image)) {
            Storage::delete($category->image);
        }
        $category->delete();
        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
