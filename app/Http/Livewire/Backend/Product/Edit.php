<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class Edit extends Component
{
    public $formAction;

    public function mount($formAction)
    {
        $this->formAction = $formAction;
    }

    
    public function render()
    {
        return view('livewire.backend.product.edit');
    }
}
