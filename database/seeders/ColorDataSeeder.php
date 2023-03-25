<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Orange',
                'code' => 'orange'
            ],[
                'name' => 'Purple',
                'code' => 'purple'
            ],
            [
                'name' => 'Yellow',
                'code' => 'yellow'
            ],[
                'name' => 'Orange',
                'code' => 'orange'
            ],[
                'name' => 'White',
                'code' => 'white'
            ],[
                'name' => 'Red',
                'code' => 'red'
            ],[
                'name' => 'Green',
                'code' => 'green'
            ],[
                'name' => 'Blue',
                'code' => 'Blue'
            ]
        ];
        foreach ($data as $val) {
            Color::create($val);
        }
    }
}
