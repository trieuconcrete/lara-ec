<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        @include('layouts.includes.admin.top_page', [
            'icon' => 'mdi-view-list',
            'title' => 'Category',
            'functions' => [
                [
                    'icon' => 'mdi-plus',
                    'route' => route('admin.category.create')
                ],
                [
                    'icon' => 'mdi-download',
                    'route' => '#'
                ]
            ]
        ])
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Category</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <a href="" wire:click="deleteCategory({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
