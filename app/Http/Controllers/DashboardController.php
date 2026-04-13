<?php
namespace App\Http\Controllers;

use App\Helpers\ExpiryStatusHelper;
use App\Helpers\PageHelper;
use App\Models\BatchModel;
use App\Models\ExpiryStatusModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $allStatuses = ExpiryStatusModel::orderBy('priority', 'asc')->get();
        $now = Carbon::now();

        $allBatches = BatchModel::with('product.category')->get()->map(function($batch) use ($allStatuses, $now) {
            $expiryDate = Carbon::parse($batch->expiry_date);
            $daysLeft = (int) $now->diffInDays($expiryDate, false);
            
            $matchedStatus = $allStatuses->first(function ($status) use ($daysLeft) {
                return $daysLeft >= $status->min_day && $daysLeft <= $status->max_day;
            });

            $batch->days_left = $daysLeft;
            $batch->status_name = $matchedStatus->name ?? 'Unknown';
            $batch->status_key = $matchedStatus ? strtolower(str_replace(' ', '_', $matchedStatus->name)) : 'unknown';
            $batch->status_priority = $matchedStatus->priority ?? 99;
            
            return $batch;
        });

        $widgetSummary = [
            'total_batch' => $allBatches->count(),
            'expired'     => $allBatches->where('status_key', 'expired')->count(),
            'critical'    => $allBatches->where('status_key', 'critical')->count(),
            'warning'     => $allBatches->where('status_key', 'warning')->count(),
        ];

        $statusDistribution = $allBatches->groupBy('status_name')->map->count();
        
        $totalExpiryStatus = [
            'key' => json_encode($statusDistribution->keys()),
            'value' => json_encode($statusDistribution->values()),
        ];

        $listProductBatch = $allBatches->groupBy('product_id')
            ->map(function ($batches) {
                $firstBatch = $batches->first();
                return (object) [
                    'product_name'   => $firstBatch->product->name ?? 'N/A',
                    'category_name'  => $firstBatch->product->category->name ?? 'N/A',
                    'total_batches'  => $batches->count(),
                    'total_quantity' => $batches->sum('quantity'),
                    'expired'        => $batches->where('status_key', 'expired')->count(),
                    'critical'       => $batches->where('status_key', 'critical')->count(),
                    'warning'        => $batches->where('status_key', 'warning')->count(),
                    'good'           => $batches->where('status_key', 'good')->count(),
                ];
            })
            ->values()
            ->take(5);

        $listPriorityBatch = $allBatches->sortBy([
                ['status_priority', 'asc'],
                ['days_left', 'asc'],
            ])
            ->take(7)
            ->map(function($batch) {
                $batch->expiry_status_badge = ExpiryStatusHelper::badge($batch->status_name);
                return $batch;
            });

        $user = Auth::user();
        $page = PageHelper::page('Dashboard', 'dashboard', '');

        return view('dashboard.admin', compact(
            'page', 
            'totalExpiryStatus', 
            'listProductBatch', 
            'listPriorityBatch', 
            'widgetSummary', 
            'user'
        ));
    }
}