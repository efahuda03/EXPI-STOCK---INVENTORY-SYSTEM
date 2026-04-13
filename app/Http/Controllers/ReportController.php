<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Models\BatchModel;
use App\Models\ExpiryStatusModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $reportType = [
            'Product Inventory',
            'Expiry Status',
        ];

        $report_type = $request->report_type ?? '';
        $listProductBatch = collect();

        if ($report_type == 'Expiry Status') 
        {
            $allStatuses = ExpiryStatusModel::orderBy('priority', 'asc')->get();

            $listProductBatch = BatchModel::with(['product.category'])
                ->get()
                ->map(function($batch) use ($allStatuses) {
                    $expiryDate = Carbon::parse($batch->expiry_date);
                    $daysLeft = (int) Carbon::now()->diffInDays($expiryDate, false);
                    
                    $matchedStatus = $allStatuses->first(function ($status) use ($daysLeft) {
                        return $daysLeft >= $status->min_day && $daysLeft <= $status->max_day;
                    });

                    $batch->status_key = $matchedStatus 
                        ? strtolower(str_replace(' ', '_', $matchedStatus->name)) 
                        : 'unknown';

                    return $batch;
                })
                ->groupBy('product_id')
                ->map(function ($batches) {
                    $firstBatch = $batches->first();
                    
                    return (object) [
                        'product_name'   => $firstBatch->product->name ?? 'N/A',
                        'category_name'  => $firstBatch->product->category->name ?? 'N/A',
                        'total_batches'  => $batches->count(),
                        'expired'        => $batches->where('status_key', 'expired')->count(),
                        'critical'       => $batches->where('status_key', 'critical')->count(),
                        'warning'        => $batches->where('status_key', 'warning')->count(),
                        'good'           => $batches->where('status_key', 'good')->count(),
                        'earliest_date'  => $batches->min('expiry_date'),
                    ];
                })
                ->sortBy('earliest_date') 
                ->values()
                ->take(10);
        } 
        elseif($report_type == 'Product Inventory') 
        {
            $listProductBatch = BatchModel::with(['product.category'])
                                ->get()
                                ->groupBy('product_id')
                                ->map(function ($batches) {
                                    $firstBatch = $batches->first();
                                    $product = $firstBatch->product;

                                    return (object) [
                                        'product_name'   => $product->name ?? 'N/A',
                                        'category_name'  => $product->category->name ?? 'Uncategorized',
                                        'total_batches'  => $batches->count(),
                                        'total_quantity' => $batches->sum('quantity'),
                                    ];
                                })
                                ->sortByDesc('total_quantity')
                                ->values()
                                ->take(10);
        }
    
        $page = PageHelper::page('Report', 'report');
        return view('report.index', compact('page','reportType', 'report_type', 'listProductBatch'));
    }

    public function exportPdf(Request $request)
    {
        $selectedReport = $request->get('report_type');
        $listProductBatch = collect();

        $viewName = 'report.pdf_inventory'; 

        if ($selectedReport == 'Product Inventory') {
            $listProductBatch = BatchModel::with(['product.category'])
                ->get()
                ->groupBy('product_id')
                ->map(function ($batches) {
                    $firstBatch = $batches->first();
                    return (object) [
                        'product_name'   => $firstBatch->product->name ?? 'N/A',
                        'category_name'  => $firstBatch->product->category->name ?? 'Uncategorized',
                        'total_batches'  => $batches->count(),
                        'total_quantity' => $batches->sum('quantity'),
                    ];
                })->values();
        } 
        elseif ($selectedReport == 'Expiry Status') {

            $viewName = 'report.pdf_expiry';
        
            $allStatuses = ExpiryStatusModel::orderBy('priority', 'asc')->get();

            $listProductBatch = BatchModel::with(['product.category'])
                ->get()
                ->map(function($batch) use ($allStatuses) {
                    $expiryDate = \Carbon\Carbon::parse($batch->expiry_date);
                    $daysLeft = (int) \Carbon\Carbon::now()->diffInDays($expiryDate, false);
                    
                    $matchedStatus = $allStatuses->first(function ($status) use ($daysLeft) {
                        return $daysLeft >= $status->min_day && $daysLeft <= $status->max_day;
                    });

                    $batch->status_key = $matchedStatus 
                        ? strtolower(str_replace(' ', '_', $matchedStatus->name)) 
                        : 'unknown';

                    return $batch;
                })
                ->groupBy('product_id')
                ->map(function ($batches) {
                    $firstBatch = $batches->first();
                    
                    return (object) [
                        'product_name'   => $firstBatch->product->name ?? 'N/A',
                        'category_name'  => $firstBatch->product->category->name ?? 'N/A',
                        'total_batches'  => $batches->count(),
                        
                        'expired'        => $batches->where('status_key', 'expired')->count(),
                        'critical'       => $batches->where('status_key', 'critical')->count(),
                        'warning'        => $batches->where('status_key', 'warning')->count(),
                        'good'           => $batches->where('status_key', 'good')->count(),
                        
                        'earliest_date'  => $batches->min('expiry_date'), 
                    ];
                })
                ->values();
        }

        $fileName = str_replace(' ', '_', $selectedReport) . '_' . date('Ymd') . '.pdf';

        $pdf = Pdf::loadView($viewName, [
            'listProductBatch' => $listProductBatch,
            'date' => date('d/m/Y h:i A'),
            'title' => $selectedReport
        ]);

        return $pdf->download($fileName);
    }
}
