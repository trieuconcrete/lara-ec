<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="removeProductOption">
                    <div class="modal-body">
                        <h6>Are you sure want to delete?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <span class="fs-5">Product Variants</span>
        </div>
        <div class="card-body">
            <form  action="{{ route('admin.product.product_variants.update', $product) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productVariants as $key => $value)
                            <tr class="product-option-tr">
                                <input type="text" name="datas[{{ $value->id }}]" class="d-none" value="update">
                                <td>
                                    <select name="colors[{{ $value->id }}]" class="form-control form-control-sm js-example-basic-single">
                                        <option value=""></option>
                                        @foreach($colorList as $item)
                                        <option value="{{ $item->id }}" {{ $value->color_id == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="sizes[{{ $value->id }}]" class="form-control js-example-basic-single">
                                        <option value=""></option>
                                        @foreach($sizeList as $item)
                                        <option value="{{ $item }}" {{ $value->size == $item ? 'selected' : null }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="quantitys[{{ $value->id }}]" class="form-control" value="{{ $value->quantity }}">
                                </td>
                                <td>
                                    <input type="text" name="prices[{{ $value->id }}]" class="form-control" value="{{ $value->price }}">
                                </td>
                                <td>
                                    <input type="file" name="images[{{ $value->id }}]" class="form-control">
                                    <x-image :path="$value->path_image" :class="'me-4 border'" :width="86" :height="86" />
                                </td>
                                <td>
                                    <button wire:click="deleteProductOption({{ $value->id }})" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                        <span class="mdi mdi-trash-can"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($inputs as $key => $value)
                            <tr wire:key="key-{{ $key }}" class="product-option-tr">
                                <input type="text" name="datas[]" class="d-none" value="insert">
                                <td>
                                    <select name="colors[]" wire.model="colors.{{ $value }}" class="form-control form-control-sm js-example-basic-single">
                                        <option value=""></option>
                                        @foreach($colorList as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="sizes[]" wire.model="sizes.{{ $value }}" class="form-control js-example-basic-single">
                                        <option value=""></option>
                                        @foreach($sizeList as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="quantitys[]" wire.model="quantitys.{{ $value }}" class="form-control" value="">
                                </td>
                                <td>
                                    <input type="text" name="prices[]" wire.model="prices.{{ $value }}" class="form-control" value="">
                                </td>
                                <td>
                                    <input type="file" name="images[]" wire.model="images.{{ $value }}" class="form-control">
                                </td>
                                <td>
                                    <button wire:click.prevent="removeRow({{ $key }})" type="button" class="btn btn-inverse-danger btn-fwb btn-sm"><span class="mdi mdi-trash-can"></span></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 mt-3 form-group text-end">
                    <button type="button" class="btn btn-inverse-primary btn-sm" wire:click.prevent="addRow({{ $row }})">
                        <span class="mdi mdi-plus"></span>
                    </button>
                </div>
                <div class="col-md-12 mt-3 form-group">
                    <button type="submit" class="btn btn-inverse-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
