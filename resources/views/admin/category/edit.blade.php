@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.top_page', [
            'icon' => 'mdi-view-list',
            'title' => 'Category',
            'functions' => [
                [
                    'icon' => 'mdi-view-list',
                    'route' => route('admin.category.index')
                ]
            ]
        ])
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" />
                            @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="slug">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" width="60px" height="60px">
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="form-check-label">
                                Status
                            </label>
                            <input type="checkbox" name="status" class="form-check-input" {{ $category->status == 1 ? 'checked' : '' }} />
                        </div>
                        <div class="col-md-12 mt-3 form-group">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}" />
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection