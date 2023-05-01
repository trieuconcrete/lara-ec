@extends('layouts.backend')

@section('title', 'Customers List')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customers List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                                <li class="breadcrumb-item active">Customers List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @livewire('backend.customer.index')
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@push('script')
<script src="{{ asset('backend/assets/js/pages/crm-companies.init.js') }}"></script>
@endpush
