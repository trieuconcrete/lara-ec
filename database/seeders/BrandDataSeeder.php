<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Faker\Factory as Faker;

class BrandDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        $faker = Faker::create();
        for($i = 0; $i <= 10; $i++) {
            Brand::create([
                'name' => $faker->name,
                'status' => 1
            ]);
        }
    }
}
