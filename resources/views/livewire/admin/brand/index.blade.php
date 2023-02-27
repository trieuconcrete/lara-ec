<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-view-list',
                'title' => 'Brand',
                'functions' => [
                    [
                        'modal' => true,
                        'icon' => 'mdi-plus',
                        'route' => '#',
                        'modal_name' => '#addBrandModal'
                    ]
                ]
            ])
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <x-image :path="$item->getImagePath()" />
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if (!$item->status)
                                                <label class="badge bg-danger">Hidden</label>
                                            @else
                                                <label class="badge bg-success">Visible</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" wire:click="editBrand({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-pencil"></span>
                                            </a>
                                            <a href="#" wire:click="deleteBrandModal({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                                <span class="mdi mdi-trash-can"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    })
</script>
@endpush