<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Project Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyProject">
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
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-view-list',
                'title' => 'Project',
                'functions' => [
                    [
                        'icon' => 'mdi-plus',
                        'route' => route('admin.project.create'),
                    ]
                ]
            ])
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <span class="fs-5">List</span>
                    <span class="float-end">{{ $projects->total() ?? 0 }} projects</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Project code</th>
                                    <th>Name En</th>
                                    <th>Name JP 1</th>
                                    <th>Name JP 2</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item->project_image) }}" alt="">
                                        </td>
                                        <td>{{ $item->project_code }}</td>
                                        <td>{{ $item->name_en }}</td>
                                        <td>{{ $item->name_jp_1 }}</td>
                                        <td>{{ $item->name_jp_2 }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.project.edit', $item->id) }}" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-pencil"></span>
                                            </a>
                                            <a href="#" wire:click="deleteProject({{$item->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                                <span class="mdi mdi-trash-can"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
