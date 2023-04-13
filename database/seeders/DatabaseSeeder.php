<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Redis::flushDB();
        $this->call([
            CategorySeeder::class,
            BrandDataSeeder::class,
            SliderDataSeeder::class,
            UserDataSeeder::class,
            ColorDataSeeder::class,
            SettingSeeder::class,
            SupplierDataSeeder::class,
            TagDataSeeder::class,
            ProductDataSeeder::class,
            ProductVariantDataSeeder::class,
            OrderDataSeeder::class,
            UpdateOrderDataSeeder::class,
            ProductReviewDataSeeder::class
        ]);
    }
}
