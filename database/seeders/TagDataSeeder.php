<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Factory as Faker;

class TagDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i <= 10; $i++) {
            Tag::create([
                'name' => $faker->name,
                'status' => 1
            ]);
        }
    }
}
