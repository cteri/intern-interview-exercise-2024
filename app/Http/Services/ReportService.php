<?php

namespace App\Http\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ReportService
{
    public function get($request)
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

        return $model->select('products.category', DB::raw('count(*) as total'))
            ->groupBy('products.category')
            ->get()
            ->toArray();
    }
}
