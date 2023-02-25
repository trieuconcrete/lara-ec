<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BrandFormRequest;

class Index extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    
    public $name, $slug, $status, $brandId, $image, $isEdit, $imageUrl;

    public function rules()
    {
        return (new BrandFormRequest())->rules();
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->image = null;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->isEdit = false;
        $this->resetInput();
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        if ($this->image) {
            $ext = $this->image->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $path = 'uploads/brand/';
            $this->image->storeAs($path, $filename);
            $filePath = $path.$filename;
        }
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status ? 1 : 0,
            'image' => $filePath ?? null,
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand(int $id)
    {
        $this->isEdit = true;
        $this->brandId = $id;
        $brand = Brand::find($id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->imageUrl = $brand->image ? asset('storage/'.$brand->image) : null;
    }

    public function updateBrand()
    {
        $validatedData = $this->validate();
        $brand = Brand::findOrFail($this->brandId);
        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status ? 1 : 0
        ];
        if ($this->image) {
            if($brand->image && Storage::exists($brand->image)) {
                Storage::delete($brand->image);
            }

            $ext = $this->image->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $path = 'uploads/brand/';
            $this->image->storeAs($path, $filename);
            $data['image'] = $path.$filename;
        }
        $brand->update($data);
        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrandModal($id)
    {
        $this->brandId = $id;
    }

    public function deleteBrand()
    {
        $brand = Brand::find($this->brandId);
        if($brand->image && Storage::exists($brand->image)) {
            Storage::delete($brand->image);
        }
        $brand->delete();
        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
        $this->brandId = null;
    }

    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
