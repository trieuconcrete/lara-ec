<div>
    <form wire:submit.prevent="save" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" class="form-control" id="formAction" name="formAction" value="{{ $formAction }}" wire:model.defer="formAction">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Product Title</label>
                            <input type="text" class="form-control" id="product-title-input" value="" placeholder="Enter product title" required  wire:model.defer="name">
                            <div class="invalid-feedback">Please Enter a product title.</div>
                        </div>
                        <div>
                            <label>Product Description</label>
                            @livewire('quill', ['value' => $description])
                            {{-- <div class="snow-editor" style="height: 240px;" wire:model.defer="description"></div> --}}
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
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute top-100 start-100 translate-middle">
                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div
                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="product-image-input"
                                            type="file" wire:model.defer="main_image" accept="image/png, image/gif, image/jpeg">
                                        <div wire:loading wire:target="main_image">Uploading...</div>
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            @if ($main_image)
                                            <img src="{{ $main_image->temporaryUrl() }}" id="product-img" class="avatar-md h-auto" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted">Add Product Gallery Images.</p>
                            <div class="mb-3">
                                <input type="file" class="form-control" wire:model="images" multiple>
                                <div wire:loading wire:target="images">Uploading...</div>
                                @error('images.*') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            @if ($images)
                                Photo Preview:
                                <div class="row">
                                    @foreach ($images as $image)
                                    <div class="col-3 card me-1 mb-1" wire:key="{{ $loop->index }}">
                                        <img src="{{ $image->temporaryUrl() }}">
                                        <button type="button" wire:click="removeImg({{ $loop->index }})">Remove</button>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
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
                                            <label class="form-label" for="manufacturer-name-input">Brand Name</label>
                                            <select class="form-select" id="choices-brand-input" name="choices-category-input"
                                                data-choices data-choices-search-false>
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
                                            <label class="form-label" for="manufacturer-brand-input">Supplier Name</label>
                                            <select class="form-select" id="choices-supplier-input" name="choices-category-input"
                                                data-choices data-choices-search-false>
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

                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="stocks-input">Stocks</label>
                                            <input type="text" class="form-control" id="stocks-input"
                                                placeholder="Stocks" required>
                                            <div class="invalid-feedback">Please Enter a product stocks.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Selling Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                <input type="text" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="orders-input">Origin Price</label>
                                            <input type="text" class="form-control" id="orders-input"
                                                placeholder="Orders" required>
                                            <div class="invalid-feedback">Please Enter a product orders.</div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end tab-pane -->

                            <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-title-input">Meta title</label>
                                            <input type="text" class="form-control" placeholder="Enter meta title"
                                                id="meta-title-input">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter meta keywords" id="meta-keywords-input">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div>
                                    <label class="form-label" for="meta-description-input">Meta Description</label>
                                    <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
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
                            <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false name="status" wire:model.defer="status">
                                <option value="1" selected>Published</option>
                                <option value="2">Scheduled</option>
                                <option value="3">Draft</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                            <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false wire:model.defer="visibility">
                                <option value="1" selected>Public</option>
                                <option value="0">Hidden</option>
                            </select>
                        </div>
                        <div class="row m-1">
                            <div class="col-6 form-check form-check-primary">
                                <input class="form-check-input" type="checkbox" id="trending" name="trending" value="1" wire:model.defer="trending">
                                <label class="form-check-label" for="trending">Trending</label>
                            </div>
                            <div class="col-6 form-check form-check-primary mb-3">
                                <input class="form-check-input" type="checkbox" id="feature" name="feature" value="1" wire:model.defer="feature">
                                <label class="form-check-label" for="feature">Feature</label>
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
                            <input type="text" id="datepicker-publish-input" class="form-control"
                                placeholder="Enter publish date" data-provider="flatpickr" data-date-format="Y-m-d" data-enable-time name="published_at" wire:model.defer="published_at">
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                New</a>Select product category</p>
                        <select class="form-select" id="choices-category-input" name="choices-category-input" data-choices data-choices-search-false name="category_id" wire:model.defer="category_id">
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
                                <input class="form-control" id="tags" data-choices data-choices-multiple-remove="true" name="tags"
                                {{-- wire:target="updateTags($event.target.value)"  --}}
                                wire:change="updateTags($event.target.value)"
                                placeholder="Enter tags" type="text" value="{{ $tags }}" />
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
                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3" name="small_description" wire:model.defer="small_description"></textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->

            <!-- end card -->
            <div class="text-start mb-3">
                <button type="submit" class="btn btn-success w-sm">Save</button>
                <div wire:loading wire:target="save">process...</div>
            </div>
        </div>
        <!-- end row -->

    </form>
</div>
@push('script')

@endpush