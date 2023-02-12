@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        @include('layouts.includes.admin.top_page', [
            'icon' => 'mdi-view-list',
            'title' => 'Category',
            'functions' => [
                [
                    'icon' => 'mdi-plus',
                    'route' => route('admin.category.create')
                ],
                [
                    'icon' => 'mdi-download',
                    'route' => '#'
                ]
            ]
        ])
        <div class="card">
            <div class="card-header">
                <h3>Category</h3>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>

@endsection