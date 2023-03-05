<div>
    <div class="detail-qty border radius">
        <a wire:click="productQuantity('down')" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
        <span class="qty-val">{{ $this->quantityCount }}</span>
        <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="hidden">
        <a wire:click="productQuantity('up')" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
    </div>
</div>
