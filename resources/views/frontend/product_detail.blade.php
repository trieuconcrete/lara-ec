@extends('layouts.frontend')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Fashion
                <span></span> Abstract Print Patchwork Dress
            </div>
        </div>
    </div>
    @livewire('frontend.product.detail', ['product' => $product])
</main>

@endsection