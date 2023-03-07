<div>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Tracking No</th>
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
                                        <td>{{ $item->billing_address }}</td>
                                        <td>{{ $item->payment_mode }}</td>
                                        <td>{{ $item->payment_mode == 'Paid By Paypal' ? 'Paid' : 'UnPaid' }}</td>
                                        <td>{{ $item->status_message }}</td>
                                        <td>{{ $item->orderItems->sum('sub_total_price') }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="action" data-title="View">
                                            <a href="#" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-eye"></span>
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
