<div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-home text-muted',
                'title' => 'Dashboard',
                'functions' => [
                    [
                        'icon' => 'mdi-plus',
                        'route' => '#',
                    ],
                    [
                        'icon' => 'mdi-clock-outline',
                        'route' => '#',
                    ],
                ],
            ])
        </div>
        <div class="col-12 grid-margin">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Products</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Avg. Session</p>
                                <p class="text-muted">max: {{ $totalProducts }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Categories</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Avg. Session</p>
                                <p class="text-muted">max: {{ $totalCategories }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Brands</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Avg. Session</p>
                                <p class="text-muted">max: {{ $totalBrands }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Clients</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Avg. Session</p>
                                <p class="text-muted">max: {{ $totalClients }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Orders</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Total. ${{ $totalOrders->sum('total_price') }}</p>
                                <p class="text-muted">max: {{ $totalOrders->count() }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Today Orders</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Total. ${{ $todayOrders->sum('total_price') }}</p>
                                <p class="text-muted">max: {{ $todayOrders->count() }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">This Month Orders</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Total. ${{ $thisMonthOrders->sum('total_price') }}</p>
                                <p class="text-muted">max: {{ $thisMonthOrders->count() }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">This Year Orders</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Total. ${{ $thisYearOrders->sum('total_price') }}</p>
                                <p class="text-muted">max: {{ $thisYearOrders->count() }}</p>
                            </div>
                            <div class="progress progress-md">
                                <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
        <livewire:livewire-column-chart
            key="{{ $columnChartModel->reactiveKey() }}"
            :column-chart-model="$columnChartModel"
        />
    </div>
</div>
