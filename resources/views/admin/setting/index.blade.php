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
                    @foreach($settings as $set)
                    <div class="row">
                        <div class="col-md-3 mb-3 form-group">
                            @if($loop->first)
                            <label class="fs-6" for="">Keys</label>
                            @endif
                            <input type="text" name="keys[]" class="form-control" placeholder="Key" readonly value="{{ $set['key'] }}" autocomplete="name"/>
                            @error('key[]') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-4 mb-3 form-group">
                            @if($loop->first)
                            <label class="fs-6" for="">Values</label>
                            @endif
                            @if($set['key'] == 'logo_header' || $set['key'] == 'logo_footer')
                                <input type="file" name="values[{{ $set['key'] }}]" class="form-control mb-2" placeholder="Value" value="{{ $set['value'] }}" />
                            @else
                                <input type="text" name="values[{{ $set['key'] }}]" class="form-control" placeholder="Value" value="{{ $set['value'] }}" />
                            @endif
                            @error('value[]') <small class="text-danger">{{ $message }}</small>@enderror
                            @if($set['key'] == 'logo_header' || $set['key'] == 'logo_footer')
                                <x-image :path="$set->getImage()" :width="120" :height="60" />
                            @endif
                        </div>
                        <div class="col-md-5 mb-3 form-group">
                            @if($loop->first)
                            <label class="fs-6" for="">Comments</label>
                            @endif
                            <textarea name="comments[{{ $set['key'] }}]" class="form-control" placeholder="Comment" rows="1">{{ $set['comment'] }}</textarea>
                            @error('comment[]') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
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