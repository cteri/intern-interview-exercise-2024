<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 50) as $index) {
            Customer::create([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'birthDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'phoneNumber' => $faker->phoneNumber,
                'amountPurchased' => $faker->randomFloat(2, 0, 10000)
            ]);
        }
    }
}
