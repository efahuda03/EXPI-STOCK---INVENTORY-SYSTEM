<?php

namespace App\Http\Controllers;

use App\Helpers\ExpiryStatusHelper;
use App\Helpers\PageHelper;
use App\Models\BatchModel;
use App\Models\ExpiryStatusModel;
use App\Models\ProductModel;
use App\Services\BatchService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BatchController extends Controller
{
    public function __construct(
        protected BatchService $batchService
    ){}

    public function index()
    {
        $allStatuses = ExpiryStatusModel::orderBy('priority', 'asc')->get();

        $listBatch = BatchModel::with('product')
            ->get()
            ->map(function($data) use ($allStatuses) {
                $expiryDate = Carbon::parse($data->expiry_date);
                $daysLeft = (int) Carbon::now()->diffInDays($expiryDate, false);
                
                $data->days_left = $daysLeft;
                
                $matchedStatus = $allStatuses->first(function ($status) use ($daysLeft) {
                    return $daysLeft >= $status->min_day && $daysLeft <= $status->max_day;
                });

                if ($matchedStatus) {
                    $data->expiry_status_badge = ExpiryStatusHelper::badge($matchedStatus->name);
                    $data->status_priority = $matchedStatus->priority;
                } else {
                    $data->expiry_status_badge = '<span class="badge bg-secondary">Unknown</span>';
                    $data->status_priority = 99;
                }

                return $data;
            })
            ->sortBy('status_priority') 
            ->values(); 

        $page = PageHelper::page('Batch Management', 'batch');
        return view('batch.index', compact('page', 'listBatch'));
    }

    public function create()
    {
        $listProduct = ProductModel::where('is_active', true)->get();
        
        $page = PageHelper::page('Add New Batch', 'batch');
        return view('batch.create', compact('page', 'listProduct'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'   => 'required|exists:product,id',
            'quantity'     => 'required|integer|min:1',
            'receive_date' => 'required|date',
            'expiry_date'  => 'required|date|after:receive_date',
        ]);

        $store = $this->batchService->store($request);

        return $store['status'] == 'error' 
                ? back()->with($store['status'], $store['text'])->withInput()
                : redirect()->route('batch.index')->with($store['status'], $store['text']);
    }

    public function edit(BatchModel $batch)
    {
        $listProduct = ProductModel::where('is_active', true)->get();

        $page = PageHelper::page('Edit Batch', 'batch');
        return view('batch.edit', compact('page', 'batch', 'listProduct'));
    }

    public function update(Request $request, BatchModel $batch)
    {
        $request->validate([
            'product_id'   => 'required|exists:product,id',
            'quantity'     => 'required|integer|min:1',
            'receive_date' => 'required|date',
            'expiry_date'  => 'required|date|after:receive_date',
        ]);

        $update = $this->batchService->update($request, $batch);

        $route = back()->with($update['status'], $update['text']);

        return $update['status'] == 'error' 
                ? $route->withInput()
                : $route;
    }

    public function destroy(BatchModel $batch)
    {
        $delete = $this->batchService->delete($batch);
        return back()->with($delete['status'], $delete['text']);
    }
}