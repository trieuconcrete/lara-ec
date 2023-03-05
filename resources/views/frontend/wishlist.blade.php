@extends('layouts.frontend')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Wishlist
            </div>
        </div>
    </div>
    @livewire('frontend.mypage.wish-list')
</main>

@endsection