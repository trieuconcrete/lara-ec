<div>
    @include('livewire.admin.color.modal-form')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.top_page', [
                'icon' => 'mdi-view-list',
                'title' => 'Color',
                'functions' => [
                    [
                        'modal' => true,
                        'icon' => 'mdi-plus',
                        'route' => '#',
                        'modal_name' => '#addColorModal'
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
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>
                                            @if (!$item->status)
                                                <label class="badge bg-danger">Hidden</label>
                                            @else
                                                <label class="badge bg-success">Visible</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" wire:click="editColor({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#updateColorModal" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-pencil"></span>
                                            </a>
                                            <a href="#" wire:click="deleteColorModal({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteColorModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                                <span class="mdi mdi-trash-can"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $colors->links() }}
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
        $('#addColorModal').modal('hide');
        $('#updateColorModal').modal('hide');
        $('#deleteColorModal').modal('hide');
    })
</script>
@endpush