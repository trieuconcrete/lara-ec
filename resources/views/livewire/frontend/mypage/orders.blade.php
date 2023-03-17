<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="orderDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="orderDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="orderDetailLabel">Order Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">
                    <div class="d-flex justify-content-center text-primary">
                        <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div wire:loading.remove>
                        @if ($this->order)
                        <div class="row">
                            <div class="col-6">
                                <span class="fs-6 fw-bolder lh-base">Order Id:</span> {{ $this->order->id }} <br>
                                <span class="fs-6 fw-bolder lh-base">Tracking No:</span> {{ $this->order->tracking_no }} <br>
                                <span class="fs-6 fw-bolder lh-base">Order Date:</span> {{ $this->order->created_at }} <br>
                                <span class="fs-6 fw-bolder lh-base">Payment Method:</span> {{ $this->order->payment_mode }} <br>
                                <span class="fs-6 fw-bolder lh-base">Payment Status:</span> {{ $this->order->payment_mode == 'Paid By Paypal' ? 'Paid' : 'UnPaid' }} <br>
                                <span class="fs-6 fw-bolder lh-base text-success">Order Stauts Message: {{ $this->order->status }}</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-6 fw-bolder lh-base">Full Name:</span> {{ $this->order->full_name }} <br>
                                <span class="fs-6 fw-bolder lh-base">Phone:</span> {{ $this->order->phone }} <br>
                                <span class="fs-6 fw-bolder lh-base">Email:</span> {{ $this->order->email }} <br>
                                <span class="fs-6 fw-bolder lh-base">Address:</span> {{ $this->order->billing_address }} <br>
                                <span class="fs-6 fw-bolder lh-base">Zipcode:</span> {{ $this->order->zipcode }}
                            </div>
                            <div class="col-12">
                                <hr class="mt-10 mb-10">
                                <h4>Order Items</h4>
                                <table class="table mt-10">
                                    <thead>
                                        <tr class="table-primary text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($this->order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td class="image product-thumbnail">
                                                <img src="{{ $item->product->getImage() }}" alt="">
                                            </td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->sub_total_price }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="5" class="text-right">Shipping</th>
                                            <td><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5" class="text-right">Total</th>
                                            <td><em>{{ $this->order->orderItems->sum('sub_total_price') }}</em></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
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
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->orderItems->sum('sub_total_price') }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="action" data-title="View">
                                        <a wire:click="orderDetailModel({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#orderDetail">
                                            <span>
                                                <i class="fi-rs-eye"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
