@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        @include('layouts.includes.admin.top_page', [
            'icon' => 'mdi-home text-muted',
            'title' => 'Dashboard',
            'functions' => [
                [
                    'icon' => 'mdi-plus',
                    'route' => '#'
                ],
                [
                    'icon' => 'mdi-clock-outline',
                    'route' => '#'
                ]
            ]
        ])
    </div>
</div>

@endsection