<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
use Faker\Factory as Faker;

class SliderDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::truncate();
        $faker = Faker::create();
        for($i = 0; $i <= 2; $i++) {
            Slider::create([
                'title' => $faker->name,
                'status' => 1,
                'description' => $faker->text(50),
                'title_md' => 'Title medium',
                'title_sm' => 'Title small medium',
            ]);
        }
    }
}
