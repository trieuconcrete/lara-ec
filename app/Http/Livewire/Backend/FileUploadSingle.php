<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploadSingle extends Component
{
    use WithFileUploads;

    public $image, $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.backend.file-upload-single');
    }
}
