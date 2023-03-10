<div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-view-list',
                'title' => 'User',
                'functions' => [
                    [
                        'icon' => 'mdi-plus',
                        'route' => route('admin.user.create'),
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-pencil"></span>
                                            </a>
                                            <a href="#" class="btn btn-inverse-danger btn-fwb btn-sm">
                                                <span class="mdi mdi-trash-can"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
