@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.breadcrumb', [
            'icon' => 'mdi-view-list',
            'title' => 'Client',
            'functions' => [
                [
                    'icon' => 'mdi-plus',
                    'route' => '',
                ]
            ]
        ])
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Order Number</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ optional($item->userDetail)->full_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->orders_count }}</td>
                                    <td>{{ ($item->sum_total_price) }}</td>
                                    <td>
                                        @if ($item->status)
                                            <label class="badge bg-success">Active</label>
                                        @else
                                            <label class="badge bg-danger">InActive</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-inverse-success btn-fw btn-sm">
                                            <span class="mdi mdi-pencil"></span>
                                        </a>
                                        <a href="#" wire:click="deleteUser({{$item->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                            <span class="mdi mdi-trash-can"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 ">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection