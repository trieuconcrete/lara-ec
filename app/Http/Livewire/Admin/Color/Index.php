<?php

namespace App\Http\Livewire\Admin\Color;

use Livewire\Component;
use App\Models\Color;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Http\Requests\ColorFormRequest;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $name, $code, $status, $colorId;

    protected function rules()
    {
        return (new ColorFormRequest())->rules();
    }

    public function resetInput()
    {
        $this->name = null;
        $this->code = null;
        $this->status = null;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function storeColor()
    {
        $validatedData = $this->validate();
        Color::create([
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status ? 1 : 0,
        ]);
        session()->flash('message', 'Color Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editColor(int $id)
    {
        $this->colorId = $id;
        $color = Color::find($id);
        $this->name = $color->name;
        $this->code = $color->code;
        $this->status = $color->status;
    }

    public function updateColor()
    {
        $validatedData = $this->validate();
        $color = Color::findOrFail($this->colorId);
        $data = [
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status ? 1 : 0
        ];
        $color->update($data);
        session()->flash('message', 'Color Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteColorModal($id)
    {
        $this->colorId = $id;
    }

    public function deleteColor()
    {
        $color = Color::find($this->colorId);
        $color->delete();
        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
        $this->colorId = null;
    }
    public function render()
    {
        $colors = Color::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.color.index', ['colors' => $colors]);
    }
}
