<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\Quill;

class Form extends Component
{
    use WithFileUploads;

    public $formAction;

    public $name, $description, $small_description, $main_image, $images = [], $tags, 
    $category_id, $brand_id, $supplier_id, 
    $meta_title, $meta_keyword, $meta_description, 
    $quantity, $selling_price, $origin_price, $discount;

    public $listeners = [
        Quill::EVENT_VALUE_UPDATED
    ];

    public function mount($formAction)
    {
        $this->formAction = $formAction;
    }

    public function quill_value_updated($value)
    {
        $this->description = $value;
    }

    public function save()
    {
        dd($this->formAction, $this->tags);
    }

    public function updateTags(string $tag)
    {
        $this->tags = implode(',', array_unique(explode(',',$tag)));
    }

    public function removeImg($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function render()
    {
        return view('livewire.backend.product.form');
    }
}
