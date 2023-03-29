<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductReview;
use Faker\Factory as Faker;

class ProductReviewDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        ProductReview::truncate();
        Product::chunk(100, function ($products) use ($faker) {
            foreach ($products as $product) {
                $users = User::with('userDetail')->where('user_type', 0)->skip(rand(1, 5))->take(rand(2, 5))->get();
                foreach ($users as $user) {
                    ProductReview::create([
                        'product_id' => $product->id,
                        'user_id' => $user->id,
                        'point' => rand(1, 5),
                        'full_name' => optional($user->userDetail)->full_name ?? $faker->name,
                        'email' => $user->email,
                        'comment' => $faker->text(30),
                        'status' => rand(0, 1)
                    ]);
                }
            }
        });
    }
}
