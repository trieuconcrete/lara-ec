<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
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
        
        return view('admin.dashboard', compact('totalProducts',
                                            'totalCategories',
                                            'totalBrands',
                                            'totalClients',
                                            'totalOrders',
                                            'todayOrders',
                                            'thisMonthOrders',
                                            'thisYearOrders'
                                        ));
    }
}
