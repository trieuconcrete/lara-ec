<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserDataSeeder::class,
            CategorySeeder::class,
            BrandDataSeeder::class,
            SliderDataSeeder::class,
            ColorDataSeeder::class,
            SettingSeeder::class,
            ProductDataSeeder::class,
            ProductVariantDataSeeder::class,
            OrderDataSeeder::class,
            UpdateOrderDataSeeder::class,
            ProductReviewDataSeeder::class
        ]);
    }
}
