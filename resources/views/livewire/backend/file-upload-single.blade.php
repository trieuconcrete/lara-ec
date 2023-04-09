<div>
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
            <input class="form-control d-none" value="" name="image" id="product-image-input"
                type="file" wire:model.defer="image"
                accept="image/png, image/gif, image/jpeg">
            <div wire:loading wire:target="image">Uploading...</div>
        </div>
        <div class="avatar-lg">
            <div class="avatar-title bg-light rounded">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" id="product-img" class="avatar-md h-auto" />
                @endif
                @if ($product)
                    <img src="{{ $product->getMainImage() }}" id="product-img" class="avatar-md h-auto" />
                @endif
            </div>
        </div>
    </div>
</div>
