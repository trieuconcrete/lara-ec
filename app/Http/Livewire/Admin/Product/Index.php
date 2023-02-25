<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::with('category', 'brand')->orderBy('updated_at', 'DESC')->paginate(10);
        return view('livewire.admin.product.index', ['products' => $products]);
    }
}
