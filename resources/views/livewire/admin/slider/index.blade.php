<div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.top_page', [
                'icon' => 'mdi-view-list',
                'title' => 'Slider',
                'functions' => [
                    [
                        'icon' => 'mdi-plus',
                        'route' => route('admin.slider.create'),
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <x-image :path="$item->getImagePath()" />
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if (!$item->status)
                                                <label class="badge bg-danger">Hidden</label>
                                            @else
                                                <label class="badge bg-success">Visible</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.slider.edit', $item->id) }}" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-pencil"></span>
                                            </a>
                                            <a href="#" wire:click="deleteSliderModal({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteSliderModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                                <span class="mdi mdi-trash-can"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $sliders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
