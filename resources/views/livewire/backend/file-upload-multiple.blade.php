<div>
    <div class="mb-3">
        <input type="file" class="form-control" name="images[]" wire:model.defer="images" multiple>
        <div wire:loading wire:target="images">Uploading...</div>
        @error('images.*')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    @if ($images)
        Photo Preview:
        <div class="row">
            @foreach ($images as $image)
                <div class="col-3 card me-1 mb-1" wire:key="{{ $loop->index }}">
                    <img src="{{ $image->temporaryUrl() }}">
                    {{-- <button type="button" class="btn btn-danger btn-sm" wire:click="removeImg({{ $loop->index }})">Remove</button> --}}
                </div>
            @endforeach
            
        </div>
    @endif
    @if($product && $product->productImages)
        Photo Preview:
        <div class="row">
            @foreach($product->productImages as $image)
            <div class="col-3 card me-1 mb-1" wire:key="{{ $loop->index }}">
                    {{-- <x-image :path="$image->getImage()" :class="'me-4 border'" :width="86" :height="86" /> --}}
                    <img src="{{ $image->getImage() }}">
                    <a href="{{ route('admin.product.remove.image', $image->id) }}" class="d-block">Remove</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
