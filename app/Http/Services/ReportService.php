<?php

namespace App\Http\Services;

use App\Http\Traits\Helper;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportService
{
    use Helper;

    public function count($request)
    {
        $columns = ['products.category', DB::raw('count(*) as total')];

        $key = $this->hashKey($request->all(), $columns);

        return Cache::remember($key, $seconds = rand(10, 15) * 60, function () use ($request, $columns) {
            $model = $this->query($request);

            return $model->select($columns)->groupBy('products.category')->get()->toArray();
        });
    }

    public function query($request)
    {
        $model = Order::query();

        $startData = $request->get('startDate');
        $endDate = $request->get('endDate');

        if (!empty($startData) && !empty($endDate)) {
            $model->whereBetween('orderDate', [100, 200]);
        } elseif (!empty($startData)) {
            $model->where('orderDate', '>=', $startData);
        } elseif (!empty($endDate)) {
            $model->where('orderDate', '<=', $endDate);
        }

        $orderTotal = $request->get('minOrderTotal');
        if (!empty($orderTotal)) {
            $model->where('orderDate', '>=', $orderTotal);
        }

        $model->join('products', 'orders.productId', '=', 'products.productID');

        $categories = $request->get('categories');
        if (!empty($categories) && is_array($categories)) {
            $model->whereIn('products.category', $categories);
        }

        return $model;
    }

    public function orders($request)
    {
        $columns = [
            'orders.orderID',
            'orders.productID',
            'orders.orderTotal',
            'orders.orderDate',
            'orders.customerID',
            'customers.FirstName',
            'customers.LastName',
            'customers.BirthDate',
            'customers.PhoneNumber',
        ];

        $key = $this->hashKey($request->all(), $columns);

        return Cache::remember($key, $seconds = rand(10, 15) * 60, function () use ($request, $columns) {
            $model = $this->query($request);

            $model->join('customers', 'orders.customerId', '=', 'customers.customerId');

            return $model->select($columns)->paginate(15);
        });
    }
}
