@extends('layouts.backend')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Breadcrumb -->
            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">{{ greeting() }}, {{ auth()->user()->name }}!</h4>
                                <p class="text-muted mb-0">{{ now()->format('d M, Y H:i') }}</p>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <form action="javascript:void(0);">
                                    <div class="row g-3 mb-0 align-items-center">
                                        <!--end col-->
                                        <div class="col-auto">
                                            <a href="{{ route('backend.product.create') }}" class="btn btn-soft-success">
                                                <i class="ri-add-circle-line align-middle me-1"></i>
                                                Add Product
                                            </a>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
            </div>
            <!-- Main Content -->
            @livewire('backend.dashboard')
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <!-- Dashboard init -->
    <script src="{{ asset('backend/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
@endpush
