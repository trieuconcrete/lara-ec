<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class Edit extends Component
{
    public $type;

    public function mount($type)
    {
        $this->type = $type;
    }

    
    public function render()
    {
        return view('livewire.backend.product.edit');
    }
}
