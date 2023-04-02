<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;

class ProductDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'name' => "Product Demo " . sprintf('%04d', $i),
                'status' => 1,
                'trending' => $trending,
                'quantity' => rand(10, 50),
                'original_price' => rand(100000, 1000000),
                'selling_price' => $original_price*2,
                'category_id' => $categories[array_rand($categories)],
                'brand_id' => $brands[array_rand($brands)],
                'small_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!',
                'meta_title' => "Product Demo {$i}",
                'meta_keyword' => "Product Demo {$i}",
                'meta_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.'
            ]);
        }
    }
}
