<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header border-0">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">Products</h5>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex gap-1 flex-wrap">
                                <a href="{{ route('backend.product.create') }}" class="btn btn-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i> Create Product</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search for Product ID, name or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="Y-m-d" data-range-date="true" id="demo-datepicker"
                                        placeholder="Published date">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <select class="form-control" data-choices data-choices-search-false
                                        name="choices-single-default" id="idCategories">
                                        <option value="">Categories</option>
                                        <option value="all" selected>All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Pickups">Pickups</option>
                                        <option value="Returns">Returns</option>
                                        <option value="Delivered">Delivered</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <select class="form-control" data-choices data-choices-search-false
                                        name="choices-single-default" id="idBrands">
                                        <option value="">Brands</option>
                                        <option value="all" selected>All</option>
                                        <option value="Mastercard">Mastercard</option>
                                        <option value="Paypal">Paypal</option>
                                        <option value="Visa">Visa</option>
                                        <option value="COD">COD</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                        <i class="ri-search-line me-1 align-bottom"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1"
                                    role="tab" aria-selected="true">
                                    <i class="ri-store-2-fill me-1 align-bottom"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#delivered"
                                    role="tab" aria-selected="false">
                                    <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Published
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#pickups"
                                    role="tab" aria-selected="false">
                                    <i class="ri-close-circle-line me-1 align-bottom"></i> Draft <span
                                        class="badge bg-danger align-middle ms-1">2</span>
                                </a>
                            </li>
                        </ul>

                        <div class="table-responsive table-card mb-1">
                            <table class="table table-nowrap align-middle" id="orderTable">
                                <thead class="text-muted table-light">
                                    <tr class="text-uppercase">
                                        <th>Product</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Orders</th>
                                        <th>Rating</th>
                                        <th>Published At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="id">
                                            <span>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded p-1">
                                                            <img src="{{ $product->getImage() }} "alt="" class="img-fluid d-block">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">
                                                            <a href="#" class="text-dark">{{ $product->name }}</a>
                                                        </h5>
                                                        <p class="text-muted mb-0">
                                                            ID: <span class="fw-small">{{ $product->id }}</span>,
                                                            Category :  <span class="fw-medium">{{ optional($product->category)->name }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                        <td class="stock">{{ money($product->quantity) }}</td>
                                        <td class="price">{{ money($product->selling_price) }}</td>
                                        <td class="orders">{{ $product->order_items_count }}</td>
                                        <td class="rating">
                                            <span>
                                                <span class="badge bg-light text-body fs-12 fw-medium">
                                                    <i class="mdi mdi-star text-warning me-1"></i>{{ round($product->product_rating) }}
                                                </span>
                                            </span>
                                        </td>
                                        <td class="date">{{ $product->created_at->format('d M, Y H:i') }}</td>
                                        <td class="status">
                                            @if (!$product->status)
                                                <span class="badge badge-soft-warning text-uppercase">Hidden</span>
                                            @else
                                                <span class="badge badge-soft-success text-uppercase">Public</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                    <a href="#"
                                                        class="text-primary d-inline-block">
                                                        <i class="ri-eye-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="{{ route('backend.product.edit', $product) }}" class="text-primary d-inline-block edit-item-btn">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                    <a wire:click="deleteProduct({{ $product->id }})" class="text-danger d-inline-block remove-item-btn"
                                                        data-bs-toggle="modal" href="#deleteProduct">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted">We've searched more than 150+ Orders We did not find any
                                        orders for you search.</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade flip" id="deleteProduct" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                    </lord-icon>
                                    <div class="mt-4 text-center">
                                        <h4>You are about to delete a product ?</h4>
                                        <p class="text-muted fs-15 mb-4">Deleting your product will remove all of
                                            your information from our database.</p>
                                        <div class="hstack gap-2 justify-content-center remove">
                                            <button class="btn btn-link link-success fw-medium text-decoration-none"
                                                id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                    class="ri-close-line me-1 align-middle"></i> Close</button>
                                            <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal -->
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
