<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 50) as $index) {
            Employee::create([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'birthDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
