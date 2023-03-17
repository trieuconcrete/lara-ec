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
        $totalOrders = Order::with('orderItems')->orderBy('order_date', 'DESC')->get();
        $todayOrders = Order::with('orderItems')->whereDate('order_date', $today)->get();
        $thisMonthOrders = Order::with('orderItems')->whereMonth('order_date', $today)->get();
        $thisYearOrders = Order::with('orderItems')->whereYear('order_date', $today)->get();

        $orders = Order::with('orderItems')->whereYear('order_date', $today)
        ->selectRaw("DATE_FORMAT(order_date, '%Y-%m') as order_date, sum(total_price) AS total_order_price")
        ->groupBy(\DB::raw("DATE_FORMAT(order_date, '%Y-%m')"))
        ->orderBy('order_date', 'ASC')
        ->get()->toArray();
        $orderDates = Arr::keyBy($orders, 'order_date');
        $amounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = ($i < 10) ? '0' . $i : $i;
            $orderDate = date('Y') . '-' . $month;
            $amounts[] = array_key_exists($orderDate, $orderDates) ? $orderDates[$orderDate]['total_order_price'] : 0;
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
            'amounts' => json_encode($amounts)
        ]);
    }
}
