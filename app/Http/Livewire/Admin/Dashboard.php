<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Arr;

class Dashboard extends Component
{
    public function render()
    {
        $today = Carbon::now();

        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalClients = User::where('user_type', 0)->count();
        $totalOrders = Order::with('orderItems')->get();
        $todayOrders = Order::with('orderItems')->whereDate('created_at', $today)->get();
        $thisMonthOrders = Order::with('orderItems')->whereMonth('created_at', $today)->get();
        $thisYearOrders = Order::with('orderItems')->whereYear('created_at', $today)->get();

        $orders = Order::with('orderItems')->whereYear('created_at', $today)
        ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as order_date, sum(total_price) AS total_order_price")
        ->groupBy(\DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->orderBy('order_date', 'ASC')
        ->get()->toArray();
        $orderDates = Arr::keyBy($orders, 'order_date');
        $columnChartModel = (new ColumnChartModel())
                ->setTitle("Order " . date('Y'))
                ->withoutLegend();
        for ($i = 1; $i <= 12; $i++) {
            $month = ($i < 10) ? '0' . $i : $i;
            $orderDate = date('Y') . '-' . $month;
            $columnChartModel = $columnChartModel->addColumn($orderDate, array_key_exists($orderDate, $orderDates) ? $orderDates[$orderDate]['total_order_price'] : 0, '#90cdf4');
        }
        return view('livewire.admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalBrands' => $totalBrands,
            'totalClients' => $totalClients,
            'totalOrders' => $totalOrders,
            'todayOrders' => $todayOrders,
            'thisMonthOrders' => $thisMonthOrders,
            'thisYearOrders' => $thisYearOrders,
            'columnChartModel' => $columnChartModel
        ]);
    }
}
