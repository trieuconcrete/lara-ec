<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploadMultiple extends Component
{
    use WithFileUploads;

    public $images, $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function removeImg($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function render()
    {
        return view('livewire.backend.file-upload-multiple');
    }
}
