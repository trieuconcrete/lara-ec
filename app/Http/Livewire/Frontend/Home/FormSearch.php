<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use Illuminate\Http\Request;

class FormSearch extends Component
{
    public $keyword, $route;
    protected $queryString = [
        'keyword' => ['except' => '', 'as' => 'keyword']
    ];

    public function mount()
    {
        $this->route = \Route::currentRouteName();
    }

    public function productSearch()
    {
        if ($this->route == 'frontend.home') {
            return redirect()->to(route('frontend.product.list', ['keyword' => $this->keyword]));
        } else {
            // dd($this->keyword);
            $this->emit('productListSearch', $this->keyword);
        }
    }

    public function render()
    {
        return view('livewire.frontend.home.form-search');
    }
}
