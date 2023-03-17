<div>
    @include('livewire.admin.order.modal_detail')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-view-list',
                'title' => 'Product',
                'functions' => [
                    [
                        'icon' => 'mdi-plus',
                        'route' => route('admin.product.create')
                    ],
                    [
                        'icon' => 'mdi-download',
                        'route' => '#'
                    ]
                ]
            ])
        </div>
    </div>
    @include('livewire.admin.order.search_form')
    <div wire:loading class="p-2" wire:target="searchOrder">
        <div class="d-flex justify-content-center text-primary">
            <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="row" wire:ignore.self>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <span class="fs-5">List</span>
                    <span class="float-end">{{ $orders->total() ?? 0 }} items</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tracking No</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Billing Address</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Status Message</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->billing_address }}</td>
                                        <td>{{ $item->payment_mode }}</td>
                                        <td>{{ $item->payment_mode == 'Paid By Paypal' ? 'Paid' : 'UnPaid' }}</td>
                                        <td>{{ \Str::title(str_replace('-', ' ', $item->status)) }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a wire:click="orderDetailModel({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#orderDetail" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-eye"></span>
                                            </a>
                                            <a wire:click="downloadOrder({{ $item->id }})" class="btn btn-inverse-primary btn-fw btn-sm ">
                                                <span class="mdi mdi-download"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
