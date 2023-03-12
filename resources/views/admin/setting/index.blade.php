@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.breadcrumb', [
            'icon' => 'mdi-view-list',
            'title' => 'Site Setting',
        ])
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Site Setting</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3 form-group">
                            <label for="key">Key</label>
                            <input type="text" name="key[]" class="form-control" placeholder="Key" value="{{ old('key[]') }}" autocomplete="name"/>
                            @error('key[]') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-4 mb-3 form-group">
                            <label for="value">Value</label>
                            <input type="text" name="value[]" class="form-control" placeholder="Value" value="{{ old('value[]') }}"/>
                            @error('value[]') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-4 mb-3 form-group">
                            <label for="comment">Comment</label>
                            <textarea type="comment[" name="comment[" class="form-control" placeholder="Comment" rows="1"></textarea>
                            @error('comment[') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <button type="button" class="btn btn-info float-end">Add</button>
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