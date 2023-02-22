@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.top_page', [
                'icon' => 'mdi-view-list',
                'title' => 'Product',
                'functions' => [
                    [
                        'icon' => 'mdi-view-list',
                        'route' => route('admin.product.index'),
                    ],
                ],
            ])
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Create</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                aria-controls="seotag-tab-pane" aria-selected="false">Seo Tag
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                data-bs-target="#detail-tab-pane" type="button" role="tab"
                                aria-controls="detail-tab-pane" aria-selected="false">Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#image-tab-pane" type="button" role="tab"
                                aria-controls="image-tab-pane" aria-selected="false">Images
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="">Category</label>
                                    <select name="category_id" class="js-example-basic-single form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="">Brand</label>
                                    <select name="brand_id" class="js-example-basic-single form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control generate-slug" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" readonly class="form-control name-slug" />
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="slug">Description</label>
                                    <textarea name="description" class="form-control" rows="3"> </textarea>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="form-check-label">
                                        Status
                                    </label>
                                    <input type="checkbox" value="1" name="status" class="form-check-input" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                            tabindex="0">
                            <div class="row">
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
                        </div>
                        <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab"
                            tabindex="0">Details
                        </div>
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">Images
                        </div>
                    </div>
                    <form action="{{ route('admin.category.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
