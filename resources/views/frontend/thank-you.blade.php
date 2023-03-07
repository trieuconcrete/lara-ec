@extends('layouts.frontend')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if(session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    <h3>Thank you for shopping!!!</h3>
                </div>
            </div>
        </div>
    </section>
    
</main>

@endsection