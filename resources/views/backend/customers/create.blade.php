@extends('layouts.backend')

@section('title', 'Create Product')

@push('style')
    <!-- quill css -->
    <link href="{{ asset('backend/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="{{ asset('backend/assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Shop</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Form -->
        @include('backend.products.form', ['formAction' => 'add', 'product' => null])

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@push('script')
    <!-- ckeditor -->
    <script src="{{ asset('backend/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    {{-- <script src="{{ asset('backend/assets/libs/dropzone/dropzone-min.js') }}"></script> --}}

    {{-- <script src="{{ asset('backend/assets/js/pages/ecommerce-product-create.init.js') }}"></script> --}}

    <!-- quill js -->
    <script src="{{ asset('backend/assets/libs/quill/quill.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
