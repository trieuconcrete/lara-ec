<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFromRequest;
use App\Models\Slider;

class SliderController extends BaseController
{
    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function save(SliderFromRequest $request)
    {
        try {
            $validateData = $request->validated();
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->title_md = $request->title_md;
            $slider->title_sm = $request->title_sm;
            $slider->link = $request->link;
            $slider->text_link = $request->text_link;
            $slider->description = $request->description;
            $slider->status = $request->status ?? 0;
            // store file
            if ($request->hasFile('image')) {
                $slider->image = $this->uploadImage($path = 'uploads/slider/', $request->file('image'));
            }

            $slider->save();

            return redirect(route('admin.slider.index'))->with('message', 'Slider Added Successfully!');
        } catch(\Exception $e) {
            return redirect(route('admin.slider.create'))->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFromRequest $request, $slider)
    {
        try {
            $validateData = $request->validated();
            $slider = Slider::findOrFail($slider);

            $slider->title = $request->title;
            $slider->title_md = $request->title_md;
            $slider->title_sm = $request->title_sm;
            $slider->link = $request->link;
            $slider->text_link = $request->text_link;
            $slider->description = $request->description;
            $slider->status = $request->status ?? 0;
            // store file
            if ($request->hasFile('image')) {
                $slider->image = $this->uploadImage($path = 'uploads/slider/', $request->file('image'), $slider->image);
            }

            $slider->update();
            return redirect(route('admin.slider.index'))->with('message', 'Slider Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }
}
