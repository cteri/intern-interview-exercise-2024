<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'productName' => $faker->word,
                'category' => $faker->randomElement(['A', 'B', 'C']),
                'price' => $faker->randomFloat(2, 1, 1000)
            ]);
        }
    }
}
