<div wire:ignore.self class="row search-form">
    <div class="col-md-3 mb-3 form-group">
        <label for="Order from">Order From</label>
        <input type="date" name="order_from" wire:model.defer="order_from" value="" class="form-control" placeholder="From"/>
    </div>
    <div class="col-md-3 mb-3 form-group">
        <label for="Order date">To</label>
        <input type="date" name="order_to" wire:model.defer="order_to" value="" class="form-control" placeholder="To"/>
    </div>
    <div class="col-md-3 mb-3 form-group">
        <label for="Order date">Tracking No</label>
        <input type="text" name="tracking_no" wire:model.defer="tracking_no" value="" class="form-control" placeholder="Tracking No"/>
    </div>
    <div class="col-md-3 mb-3 form-group">
        <label for="Order date">Status</label>
        <select name="status" wire:model.defer="status" class="form-select form-control-lm">
            <option value=""></option>
            <option value="in-progress">In Progress</option>
            <option value="completed">Completed</option>
            <option value="pending">Pending</option>
            <option value="cancelled">Cancelled</option>
            <option value="out-for-delivery">Out For Delivery</option>
        </select>
    </div>
    <div class="col-md-12 mb-3 mt-10 text-center">
        <button type="button" wire:click="searchOrder()" class="btn btn-primary text-white">Search</button>
        <button type="button" wire:click="resetSearchForm()" class="btn btn-secondary text-white ml-10">Reset</button>
    </div>
</div>