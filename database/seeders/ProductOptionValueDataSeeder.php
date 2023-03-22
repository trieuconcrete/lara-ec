<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductOptionValue;
use App\Models\Color;
use App\Constants;

class ProductOptionValueDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = Constants::PRODUCT_SIZES;
        $colors = Color::pluck('id')->toArray();

        Product::where('status', 1)->chunk(100, function($products) use ($colors, $sizes) {
            foreach($products as $prod) {
                $prodId = $prod->id;
                for($i = 0; $i <= rand(5, 30); $i++) {
                    ProductOptionValue::create([
                        'product_id' => $prodId,
                        'color_id' => $colors[array_rand($colors)],
                        'size' => $sizes[array_rand($sizes)],
                        'quantity' => rand(5, 10),
                        'price' => rand(100000, 500000)
                    ]);
                }
            }
        });
    }
}
