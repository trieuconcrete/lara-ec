@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.top_page', [
            'icon' => 'mdi-view-list',
            'title' => 'Category',
            'functions' => [
                [
                    'icon' => 'mdi-list',
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
                <form action="{{ route('admin.category.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" />
                            @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="slug">Description</label>
                            <textarea name="description" class="form-control" rows="3"> </textarea>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="form-check-label">
                                Status
                            </label>
                            <input type="checkbox" name="status" class="form-check-input" />
                        </div>
                        <div class="col-md-12 mb-3 form-group">
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