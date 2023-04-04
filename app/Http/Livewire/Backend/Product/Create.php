<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class Create extends Component
{
    public $formAction;

    public function mount($formAction)
    {
        $this->formAction = $formAction;
    }

    public function render()
    {
        return view('livewire.backend.product.create');
    }
}
