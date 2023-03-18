@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-view-list',
                'title' => 'Product',
                'functions' => [
                    [
                        'icon' => 'mdi-view-list',
                        'route' => route('admin.product.index'),
                    ],
                ],
            ])
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Create</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane"
                                type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane"
                                type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">Seo Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane"
                                type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Images
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane"
                                type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Colors
                            </button>
                        </li>
                    </ul>
                    <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="">Category</label>
                                        <select name="category_id"
                                            class="js-example-basic-single form-control form-control-sm">
                                            <option value=""></option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ ($product->category_id == $cat->id) ? 'selected' : null }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="">Brand</label>
                                        <select name="brand_id"
                                            class="js-example-basic-single form-control form-control-sm">
                                            <option value=""></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ ($product->brand_id == $brand->id) ? 'selected' : null }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control generate-slug" />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" value="{{ $product->slug }}" readonly class="form-control name-slug" />
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="small_description">Small Description(<= 500 Words)</label>
                                        <textarea name="small_description" class="form-control" rows="3">{{ $product->small_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-3 mb-3 form-group">
                                        <label for="original_price">Original Price</label>
                                        <input type="text" name="original_price" class="form-control" value="{{ $product->original_price }}" />
                                        @error('original_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3 form-group">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}" />
                                        @error('selling_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3 form-group">
                                        <label for="sale_off">Sale Off</label>
                                        <input type="text" name="sale_off" class="form-control" value="{{ $product->sale_off }}" />
                                        @error('selling_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3 form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}" />
                                        @error('quantity')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3 form-group">
                                        <label for="form-check-label">
                                            Trending
                                        </label>
                                        <input type="checkbox" value="1" name="trending" {{ $product->trending ? 'checked' : null }}
                                            class="form-check-input" />
                                    </div>
                                    <div class="col-md-4 mb-3 form-group">
                                        <label for="form-check-label">
                                            Featured
                                        </label>
                                        <input type="checkbox" value="1" name="featured" {{ $product->featured ? 'checked' : null }}
                                            class="form-check-input" />
                                    </div>
                                    <div class="col-md-4 mb-3 form-group">
                                        <label for="form-check-label">
                                            Status
                                        </label>
                                        <input type="checkbox" value="1" name="status"  {{ $product->status ? 'checked' : null }} class="form-check-input" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-12 mb-3 form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}" />
                                    </div>
                                    <div class="col-md-12 mb-3 form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="3">{{ $product->meta_keyword }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3 form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="3">{{ $product->meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade mb-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-12 mb-3 form-group">
                                        <label for="product_images">Product Images</label>
                                        <input type="file" name="product_images[]" class="form-control" multiple/>
                                        @error('product_images') <small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    @if($product->productImages)
                                        @foreach($product->productImages as $image)
                                            <div class="col-md-2">
                                                <x-image :path="$image->getImage()" :class="'me-4 border'" :width="86" :height="86" />
                                                <a href="{{ route('admin.product.remove.image', $image->id) }}" class="d-block">Remove</a>
                                            </div>
                                        @endforeach
                                    @else
                                     No Images
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade mb-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="row">
                                    @foreach($colors as $item)
                                    <div class="col-md-3">
                                        <div class="p-3 border mb-3">
                                            Color: <input type="checkbox" name="product_colors[{{ $item->id }}]" value="{{ $item->id }}" class="form-check-input"/>
                                            {{ $item->name }}
                                            <br>
                                            Quantity: <input type="text" name="quantities[{{ $item->id }}]" value="" class="" style="width:60px"/>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Color Name</th>
                                                    <th>Color Code</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product->productColors as $item)
                                                <tr class="pro-color-tr">
                                                    <td>{{ $item->color->name }}</td>
                                                    <td>{{ $item->color->code }}</td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width:150px">
                                                            <input type="text" value="{{ $item->quantity }}" class="prod-color-qty form-control form-control-sm" />
                                                            <button type="button" value="{{ $item->id }}" class="btnUpdateProductColor btn btn-primary">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btnDeleteProductColor btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btnUpdateProductColor').click(function() {
            var product_id = "{{ $product->id }}";
            var product_color_id = $(this).val();
            var qty = $(this).closest('.pro-color-tr').find('.prod-color-qty').val();

            if (qty <= 0) {
                alert('Quantity is required')
                return false;
            }

            var data = {
                'product_id': product_id,
                'product_color_id': product_color_id,
                'qty': qty,
            };
            $.ajax({
                type: "POST",
                url: "/admin/products/color/"+product_color_id+"/quantity",
                data: data,
                success: function(res) {
                    alert(res.message)
                }
            });
        })

        $('.btnDeleteProductColor').click(function() {
            var product_id = "{{ $product->id }}";
            var product_color_id = $(this).closest('.pro-color-tr').find('.btnUpdateProductColor').val();

            var data = {
                'product_id': product_id,
                'product_color_id': product_color_id,
            };
            $.ajax({
                type: "POST",
                url: "/admin/products/color/"+product_color_id,
                data: data,
                success: function(res) {
                    alert(res.message)
                }
            });
        })
    })
</script>
@endpush
