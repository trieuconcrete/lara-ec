@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Category
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm text-white float-end">Create</a>
                </h3>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>

@endsection