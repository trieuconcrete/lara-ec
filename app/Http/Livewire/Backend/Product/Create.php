<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class Create extends Component
{
    public $type;

    public function mount($type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.backend.product.create');
    }
}
