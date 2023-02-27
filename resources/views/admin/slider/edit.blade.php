@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.breadcrumb', [
            'icon' => 'mdi-view-list',
            'title' => 'slider',
            'functions' => [
                [
                    'icon' => 'mdi-view-list',
                    'route' => route('admin.slider.index')
                ]
            ]
        ])
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Create</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control" />
                            @error('title') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $slider->title }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" />
                            @error('image') <small class="text-danger">{{ $message }}</small>@enderror
                            <x-image :path="$slider->getImagePath()" :width="60" :height="60" />
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="form-check-label">
                                Status
                            </label>
                            <input type="checkbox" value="1" name="status" class="form-check-input" {{ $slider->status == 1 ? 'checked' : '' }} />
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="title_md">Medium Title</label>
                            <input type="text" name="title_md" class="form-control" value="{{ $slider->title_md }}" />
                            @error('title_md') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="title_sm">Small Title</label>
                            <input type="text" name="title_sm" class="form-control" value="{{ $slider->title_sm }}" />
                            @error('title_sm') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" value="{{ $slider->link }}" />
                            @error('link') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="text_link">Text Link</label>
                            <input type="text" name="text_link" class="form-control" value="{{ $slider->text_link }}" />
                            @error('text_link') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
