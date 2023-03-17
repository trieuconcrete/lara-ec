<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class UpdateOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::with('orderItems')->chunk(100, function($orders) {
            foreach($orders as $item) {
                $item->update([
                    'total_price' =>  $item->orderItems->sum('sub_total_price'),
                    'order_date' => $item->created_at
                ]);
            }
        });
    }
}
