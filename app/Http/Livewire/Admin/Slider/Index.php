<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.slider.index', compact('sliders'));
    }
}
