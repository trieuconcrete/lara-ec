@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.breadcrumb', [
            'icon' => 'mdi-view-list',
            'title' => 'Project',
            'functions' => [
                [
                    'icon' => 'mdi-view-list',
                    'route' => route('admin.project.index')
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
                <form action="{{ route('admin.project.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name_en">Name En</label>
                            <input type="text" name="name_en" class="form-control" placeholder="Name" value="{{ old('name_en') }}" required autocomplete="name" autofocus/>
                            @error('name_en') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="project_code">Project Code</label>
                            <input type="text" name="project_code" class="form-control" placeholder="Project Code" value="{{ old('project_code') }}" required autocomplete="name" autofocus/>
                            @error('project_code') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name_jp_1">Name JP 1</label>
                            <input type="text" name="name_jp_1" class="form-control" placeholder="Name" value="{{ old('name_jp_1') }}" autocomplete="name" autofocus/>
                            @error('name_jp_1') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name_jp_2">Name JP 2</label>
                            <input type="text" name="name_jp_2" class="form-control" placeholder="Name" value="{{ old('name_jp_2') }}" autocomplete="name" autofocus/>
                            @error('name_jp_2') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control form-control-sm">
                                <option value=""></option>
                                @foreach($status as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control form-control-sm">
                                <option value=""></option>
                                @foreach($types as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="start_date">Start Date</label>
                            <input type="text" name="start_date" class="form-control" placeholder="Name" value="{{ old('start_date') }}" autocomplete="name" autofocus/>
                            @error('start_date') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="end_date">End Date</label>
                            <input type="text" name="end_date" class="form-control" placeholder="Name" value="{{ old('end_date') }}" autocomplete="name" autofocus/>
                            @error('end_date') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" />
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