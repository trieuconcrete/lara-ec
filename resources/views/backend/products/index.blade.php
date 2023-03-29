@extends('layouts.backend')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shop</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

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
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i> Create Product</button>
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
                                        <a class="nav-link active All py-3" data-bs-toggle="tab" id="All"
                                            href="#home1" role="tab" aria-selected="true">
                                            <i class="ri-store-2-fill me-1 align-bottom"></i> All
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered"
                                            href="#delivered" role="tab" aria-selected="false">
                                            <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Published
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups"
                                            href="#pickups" role="tab" aria-selected="false">
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
                                            <tr>
                                                <td class="id">
                                                    <span>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded p-1">
                                                                    <img src="{{ asset('backend/assets/images/products/img-1.png')}} " alt="" class="img-fluid d-block">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">
                                                                    <a href="apps-ecommerce-product-details.html" class="text-dark">Half Sleeve Round Neck T-Shirts</a>
                                                                </h5>
                                                                <p class="text-muted mb-0">Category : <span class="fw-medium">Fashion</span></p>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td class="stock">12</td>
                                                <td class="price">$215.00</td>
                                                <td class="orders">48</td>
                                                <td class="rating">
                                                    <span>
                                                        <span class="badge bg-light text-body fs-12 fw-medium">
                                                            <i class="mdi mdi-star text-warning me-1"></i>4.2
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="date">20 Dec, 2021, <small class="text-muted">02:21
                                                    AM</small></td>
                                                <td class="status"><span
                                                        class="badge badge-soft-warning text-uppercase">Active</span>
                                                </td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="View">
                                                            <a href="apps-ecommerce-order-details.html"
                                                                class="text-primary d-inline-block">
                                                                <i class="ri-eye-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="Edit">
                                                            <a href="#showModal" data-bs-toggle="modal"
                                                                class="text-primary d-inline-block edit-item-btn">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top"
                                                            title="Remove">
                                                            <a class="text-danger d-inline-block remove-item-btn"
                                                                data-bs-toggle="modal" href="#deleteOrder">
                                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
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
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form class="tablelist-form" autocomplete="off">
                                            <div class="modal-body">
                                                <input type="hidden" id="id-field" />

                                                <div class="mb-3" id="modal-id">
                                                    <label for="orderId" class="form-label">ID</label>
                                                    <input type="text" id="orderId" class="form-control"
                                                        placeholder="ID" readonly />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="customername-field" class="form-label">Customer
                                                        Name</label>
                                                    <input type="text" id="customername-field" class="form-control"
                                                        placeholder="Enter name" required />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productname-field" class="form-label">Product</label>
                                                    <select class="form-control" data-trigger name="productname-field"
                                                        id="productname-field" required />
                                                    <option value="">Product</option>
                                                    <option value="Puma Tshirt">Puma Tshirt</option>
                                                    <option value="Adidas Sneakers">Adidas Sneakers</option>
                                                    <option value="350 ml Glass Grocery Container">350 ml Glass Grocery
                                                        Container</option>
                                                    <option value="American egale outfitters Shirt">American egale
                                                        outfitters Shirt</option>
                                                    <option value="Galaxy Watch4">Galaxy Watch4</option>
                                                    <option value="Apple iPhone 12">Apple iPhone 12</option>
                                                    <option value="Funky Prints T-shirt">Funky Prints T-shirt</option>
                                                    <option value="USB Flash Drive Personalized with 3D Print">USB Flash
                                                        Drive Personalized with 3D Print</option>
                                                    <option value="Oxford Button-Down Shirt">Oxford Button-Down Shirt
                                                    </option>
                                                    <option value="Classic Short Sleeve Shirt">Classic Short Sleeve Shirt
                                                    </option>
                                                    <option value="Half Sleeve T-Shirts (Blue)">Half Sleeve T-Shirts (Blue)
                                                    </option>
                                                    <option value="Noise Evolve Smartwatch">Noise Evolve Smartwatch
                                                    </option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-field" class="form-label">Order Date</label>
                                                    <input type="date" id="date-field" class="form-control"
                                                        data-provider="flatpickr" required data-date-format="d M, Y"
                                                        data-enable-time required placeholder="Select date" />
                                                </div>

                                                <div class="row gy-4 mb-3">
                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="amount-field" class="form-label">Amount</label>
                                                            <input type="text" id="amount-field" class="form-control"
                                                                placeholder="Total amount" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="payment-field" class="form-label">Payment
                                                                Method</label>
                                                            <select class="form-control" data-trigger
                                                                name="payment-method" required id="payment-field">
                                                                <option value="">Payment Method</option>
                                                                <option value="Mastercard">Mastercard</option>
                                                                <option value="Visa">Visa</option>
                                                                <option value="COD">COD</option>
                                                                <option value="Paypal">Paypal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="delivered-status" class="form-label">Delivery
                                                        Status</label>
                                                    <select class="form-control" data-trigger name="delivered-status"
                                                        required id="delivered-status">
                                                        <option value="">Delivery Status</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Inprogress">Inprogress</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                        <option value="Pickups">Pickups</option>
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="Returns">Returns</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                                        Order</button>
                                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body p-5 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                            </lord-icon>
                                            <div class="mt-4 text-center">
                                                <h4>You are about to delete a order ?</h4>
                                                <p class="text-muted fs-15 mb-4">Deleting your order will remove all of
                                                    your information from our database.</p>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button
                                                        class="btn btn-link link-success fw-medium text-decoration-none"
                                                        id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-danger" id="delete-record">Yes, Delete
                                                        It</button>
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
        <!-- container-fluid -->
    </div>
@endsection
