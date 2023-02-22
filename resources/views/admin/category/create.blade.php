@extends('layouts.admin')

@section('content')

<div class="row">
    <x-button />
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
                <h3>Create</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control generate-slug" />
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" readonly class="form-control name-slug" />
                            @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="parent">Parent</label>
                            <select name="parent_id" id="parent" class="js-example-basic-single form-control form-control-sm">
                                <option value=""></option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="slug">Description</label>
                            <textarea name="description" class="form-control" rows="3"> </textarea>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" />
                            @error('image') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="form-check-label">
                                Status
                            </label>
                            <input type="checkbox" value="1" name="status" class="form-check-input" />
                        </div>
                        <div class="col-md-12 form-group">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3"> </textarea>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3"> </textarea>
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
