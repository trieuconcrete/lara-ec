<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;

class OrderDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::where('user_type', 0)->pluck('id')->toArray();
        $status = ['in-progress', 'completed', 'cancelled', 'pending'];
        $payment_mode = ['Cash On Delivery', 'Paypal', 'Card Payment'];
        for($i = 0; $i <= 10000; $i++) {
            $user = User::with('userDetail')->where('id', $users[array_rand($users)])->first();
            $order = Order::create([
                'user_id' => $user->id,
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $user->email,
                'phone' => $faker->phoneNumber,
                'billing_address' => $faker->address,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'status' => $status[array_rand($status)],
                'payment_mode' => $payment_mode[array_rand($payment_mode)],
                'order_date' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)
            ]);
            $products = Product::where('status', 1)->skip(rand(1, 1000))->take(rand(5, 10))->get();
            $total_price = 0;
            foreach($products as $prod) {
                $quantity = rand(1, 10);
                $price = rand(100000, 200000);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $prod->id,
                    'quantity' => $quantity,
                    'price' => $price
                ]);
                $total_price += $quantity*$price;
            }
            $order->update(['total_price' => $total_price]);
        }
    }
}
