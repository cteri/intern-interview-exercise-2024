<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Http\Services\ReportService;

class ReportController extends Controller
{
    protected ReportService $service;

    public function __construct(ReportService $reportService)
    {
        $this->service = $reportService;
    }

    public function show(ReportRequest $request)
    {
        $result = $this->service->get($request);

        $chartOptions = array_map(function($item) {
            return $item['category'];
        }, $result);


        $chartData = array_map(function($item) {
            return $item['total'];
        }, $result);

        return view('report', compact('chartData', 'chartOptions'));
    }
}
