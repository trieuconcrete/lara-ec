<div>
    <form onkeydown="return event.key != 'Enter';">                                
        <input wire:keydown.enter="productSearch" wire:model.defer="keyword" placeholder="Search for items...">
    </form>
</div>
@push('script')
@endpush