@extends('layouts.frontend')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    @livewire('frontend.product.index')
</main>

@endsection