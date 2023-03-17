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
        <div class="row">
            <div class="col-7" id="chart"></div>
            <div class="col-5">
                <p class="fs-5 text-center">Recently order</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    User
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($totalOrders->take(20)->values()->all() as $item)
                            <tr>
                                <td>
                                    {{ $item->full_name }}
                                </td>
                                <td>
                                    {{ $item->status_message }}
                                </td>
                                <td>
                                    {{ $item->total_price }}
                                </td>
                                <td>
                                    {{ $item->order_date }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var options = {
            series: [{
                data: {{ $amounts }}
            }],
            chart: {
                type: 'bar',
                height: 450
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val
                    }
                }
            },
            title: {
                text: "Sale {{ date('Y') }} ",
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    fontFamily: undefined,
                    color: '#263238'
                },
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
@push('style')
<style>
    .table > tbody {
        height: 25rem;
        display: table-caption;
        overflow-y: scroll;
    }
</style>
@endpush
