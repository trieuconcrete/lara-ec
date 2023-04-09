@include('layouts.partials.backend.alert')
<form action="{{ route('backend.product.save') }}" method="post" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
    @csrf
    <input type="hidden" class="form-control" id="formAction" name="formAction" value="{{ $formAction }}">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Product Title</label>
                        <input type="text" class="form-control" id="product-title-input" value="{{ $product ? $product->name : old('name') }}" placeholder="Enter product title" name="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label>Product Description</label>
                        @livewire('quill', ['value' => $product ? $product->description : old('quill-contents')])
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Images</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <p class="text-muted">Add Product main Image.</p>
                        <div class="text-center">
                            @livewire('backend.file-upload-single', ['product' => $product])
                        </div>
                    </div>
                    <div>
                        <p class="text-muted">Add Product Gallery Images.</p>
                        @livewire('backend.file-upload-multiple', ['product' => $product])
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                role="tab">
                                General Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                Meta Data
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="brand-name-input">Brand Name</label>
                                        <select class="form-select" id="choices-brand-input" name="brand_id" data-choices data-choices-search-false>
                                            <option value="Appliances">Appliances</option>
                                            <option value="Automotive Accessories">Automotive Accessories</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Grocery">Grocery</option>
                                            <option value="Kids">Kids</option>
                                            <option value="Watches">Watches</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="supplier-brand-input">Supplier Name</label>
                                        <select class="form-select" name="supplier_id" data-choices data-choices-search-false>
                                            <option value="Appliances">Appliances</option>
                                            <option value="Automotive Accessories">Automotive Accessories</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Grocery">Grocery</option>
                                            <option value="Kids">Kids</option>
                                            <option value="Watches">Watches</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mt-3">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="stocks-input">Stocks</label>
                                        <input type="text" class="form-control" id="stocks-input" name="quantity" placeholder="Stocks" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-price-input">Selling Price</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon">$</span>
                                            <input type="text" class="form-control" name="selling_price" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-discount-input">Discount</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                            <input type="text" class="form-control" name="discount" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="orders-input">Origin Price</label>
                                        <input type="text" class="form-control" id="orders-input"
                                            wire:model.defer="origin_price" placeholder="Orders">
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="number_month_brand_warranty-input">Number Month Brand Warranty</label>
                                        <input type="text" class="form-control" name="number_month_brand_warranty" id="number_month_brand_warranty-input" placeholder="Number Month Brand Warranty">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="number_day_return-input">Number Day
                                            Return</label>
                                        <input type="text" class="form-control" name="number_day_return" id="number_day_return-input" placeholder="Number Day Return">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 form-check form-check-primary">
                                    <div class="mt-4">
                                        <input class="form-check-input" checked type="checkbox" id="is_cash_on_delivery" name="is_cash_on_delivery" value="1" >
                                        <label class="form-check-label" for="is_cash_on_delivery">Cash On Delivery Available</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end tab-pane -->

                        <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-title-input">Meta title</label>
                                        <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title" id="meta-title-input">
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                        <input type="text" class="form-control" placeholder="Enter meta keywords" id="meta-keywords-input" name="meta_keyword">
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div>
                                <label class="form-label" for="meta-description-input">Meta Description</label>
                                <textarea class="form-control" id="meta-description-input" name="meta_description" placeholder="Enter meta description" rows="3"></textarea>
                            </div>
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Publish</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="choices-publish-status-input" class="form-label">Status</label>
                        <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false name="status">
                            <option value="1" selected>Published</option>
                            <option value="2">Scheduled</option>
                            <option value="3">Draft</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                        <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false name="is_visibility">
                            <option value="1" selected>Public</option>
                            <option value="0">Hidden</option>
                        </select>
                    </div>
                    <div class="row m-1">
                        <div class="col-6 form-check form-check-primary">
                            <input class="form-check-input" type="checkbox" id="trending" name="trending" value="1">
                            <label class="form-check-label" for="trending">Trending</label>
                        </div>
                        <div class="col-6 form-check form-check-primary mb-3">
                            <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1">
                            <label class="form-check-label" for="featured">Feature</label>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Publish Schedule</h5>
                </div>
                <!-- end card body -->
                <div class="card-body">
                    <div>
                        <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                        <input type="text" id="datepicker-publish-input" class="form-control" placeholder="Enter publish date" data-provider="flatpickr" data-date-format="Y-m-d" data-enable-time name="published_at">
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Categories</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">
                        <a href="#" class="float-end text-decoration-underline">Add New</a>
                        Select product category
                    </p>
                    <select class="form-select" id="choices-category-input" name="choices-category-input"
                        data-choices data-choices-search-false name="category_id">
                        <option value="Appliances">Appliances</option>
                        <option value="Automotive Accessories">Automotive Accessories</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Grocery">Grocery</option>
                        <option value="Kids">Kids</option>
                        <option value="Watches">Watches</option>
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Tags</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-3 align-items-start">
                        <div class="flex-grow-1" wire:ignore>
                            <input class="form-control" id="tags" data-choices data-choices-multiple-remove="true" name="tags" placeholder="Enter tags" type="text" value=""/>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Short Description</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Add short description for product</p>
                    <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3" name="small_description"></textarea>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

        <!-- end card -->
        <div class="text-start mb-3">
            <button type="submit" class="btn btn-success w-sm" id="btn-submit">Save</button>
        </div>
    </div>
    <!-- end row -->

</form>
