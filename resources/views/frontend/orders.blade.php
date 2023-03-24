@extends('layouts.frontend')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Orders
            </div>
        </div>
    </div>
    @livewire('frontend.mypage.orders')
</main>

@endsection