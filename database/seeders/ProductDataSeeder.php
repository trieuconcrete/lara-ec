<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;

class ProductDataSeeder extends Seeder
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
        $categories = Category::where('status', 1)->pluck('id')->toArray();
        $brands = Brand::where('status', 1)->pluck('id')->toArray();
    
        for($i = 0; $i <= 1000; $i++) {
            $original_price = rand(100000, 1000000);
            $trending = 0;
            if ($i <= 16) {
                $trending = 1;
            }
            $product = Product::create([
                'name' => $faker->name,
                'status' => 1,
                'trending' => $trending,
                'quantity' => rand(10, 50),
                'original_price' => rand(100000, 1000000),
                'selling_price' => $original_price*2,
                'category_id' => $categories[array_rand($categories)],
                'brand_id' => $brands[array_rand($brands)],
                'small_description' => $faker->text,
                'description' => $faker->text(500),
                'meta_title' => $faker->text(50),
                'meta_keyword' => $faker->text(50),
                'meta_description' => $faker->text,
                'rating' => $faker->randomFloat(1, 0, 5)
            ]);
        }
    }
}
