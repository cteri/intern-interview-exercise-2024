<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $customer = Customer::inRandomOrder()->first();
            $employee = Employee::inRandomOrder()->first();
            $product = Product::inRandomOrder()->first();

            $startDate = Carbon::parse($customer->birthDate)->addDay();
            $endDate = 'now';

            Order::create([
                'customerID' => $customer->customerID,
                'employeeID' => $employee->employeeID,
                'productID' => $product->productID,
                'orderTotal' => $product->price * rand(1, 5),
                'orderDate' => $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d H:i:s')
            ]);
        }
    }
}
