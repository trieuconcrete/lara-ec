<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $sliderId;

    public function deleteSlider($id)
    {
        $this->sliderId = $id;
    }

    public function destroySlider()
    {
        $slider = Slider::find($this->sliderId);
        if(Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }
        $slider->delete();
        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.slider.index', compact('sliders'));
    }
}
