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
                'code' => 'orange',
                'status' => 1
            ],[
                'name' => 'Purple',
                'code' => 'purple',
                'status' => 1
            ],
            [
                'name' => 'Yellow',
                'code' => 'yellow',
                'status' => 1
            ],[
                'name' => 'Orange',
                'code' => 'orange',
                'status' => 1
            ],[
                'name' => 'White',
                'code' => 'white',
                'status' => 1
            ],[
                'name' => 'Red',
                'code' => 'red',
                'status' => 1
            ],[
                'name' => 'Green',
                'code' => 'green',
                'status' => 1
            ],[
                'name' => 'Blue',
                'code' => 'blue',
                'status' => 1
            ]
        ];
        Color::insert($data);
    }
}
