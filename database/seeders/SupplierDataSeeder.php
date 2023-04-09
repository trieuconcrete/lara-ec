<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
use Faker\Factory as Faker;

class SupplierDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i <= 10; $i++) {
            Supplier::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'address' => $faker->streetAddress,
                'code' => $faker->postcode,
                'status' => 1
            ]);
        }
    }
}
