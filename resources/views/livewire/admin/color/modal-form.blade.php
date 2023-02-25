<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addColorModal" tabindex="-1" aria-labelledby="colorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="colorModal">Add color</h1>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form wire:submit.prevent="storeColor()">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Color Name</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Code</label>
                                <input type="text" wire:model.defer="code" class="form-control">
                                @error('code')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" value="1" wire:model.defer="status" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updateColorModal" tabindex="-1" aria-labelledby="colorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="colorModal">Update Color</h1>
                <button type="button" class="btn-close" wire:click="closeModal()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="d-flex justify-content-center text-primary">
                    <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="updateColor()">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" wire:model.defer="name" class="form-control generate-slug">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Code</label>
                                <input type="text" wire:model.defer="code" class="form-control generate-slug">
                                @error('code')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" value="1" wire:model.defer="status" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal delete-->
<div wire:ignore.self class="modal fade" id="deleteColorModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Color Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="deleteColor()">
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