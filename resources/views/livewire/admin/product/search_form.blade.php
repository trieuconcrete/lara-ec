<div wire:ignore.self class="row search_form">
    <div class="col-md-3 mb-3 form-group">
        <label for="keyword">Keyword</label>
        <input type="text" name="keyword" wire:model.defer="keyword" value="" class="form-control" placeholder="Keyword"/>
    </div>
    <div class="col-md-3 mb-3 form-group">
        <label for="category">Category</label>
        <select name="category" wire:model.defer="category" class="form-select form-control-lm">
            <option value=""></option>
            @foreach($categories as $item)
            <option value="{{ $item->slug }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3 form-group">
        <label for="brand">Brand</label>
        <select name="brand" wire:model.defer="brand" class="form-select form-control-lm">
            <option value=""></option>
            @foreach($brands as $item)
            <option value="{{ $item->slug }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3 form-group">
        <label for="Order date">Status</label>
        <select name="status" wire:model.defer="status" class="form-select form-control-lm">
            <option value=""></option>
            <option value="1">Activie</option>
            <option value="0">InActive</option>
        </select>
    </div>
    <div class="col-md-12 mb-3 mt-10 text-center">
        <button type="button" wire:click="searchProduct()" class="btn btn-primary text-white">Search</button>
        <button type="button" wire:click="resetSearchForm()" class="btn btn-secondary text-white ml-10">Reset</button>
    </div>
</div>