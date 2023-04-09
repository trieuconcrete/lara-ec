@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code')
<img src="{{ asset('backend/assets/images/error400-cover.png') }}" alt="error img" class="img-fluid">
@endsection
@section('message')
<h3 class="text-uppercase">Sorry, Page not Found 😭</h3>
<p class="text-muted mb-4">The page you are looking for not available!</p>
@endsection
