<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class Form extends Component
{
    public $type;

    public function mount($type)
    {
        $this->type = $type;
    }
    public function render()
    {
        return view('livewire.backend.product.form');
    }
}
