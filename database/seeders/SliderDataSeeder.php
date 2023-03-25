<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
class SliderDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 2; $i++) {
            Slider::create([
                'title' => "Slider 0{$i}",
                'status' => 1,
                'description' => 'description',
                'title_md' => 'title medium',
                'title_sm' => 'title small medium',
            ]);
        }
    }
}
