<?php

namespace App\Services;

use App\Helpers\PageHelper;
use App\Models\BatchModel;
use App\Models\ProductModel;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BatchService
{
    public function __construct(
        protected AuditLogService $auditLogService
    ) {}

    private function generateBatchNumber($productId)
    {
        $product = ProductModel::find($productId);
        $name = $product->name;
        $year = Carbon::now()->format('Y');

        $words = explode(' ', $name);
        if (count($words) > 1) {
            // Ambil huruf pertama setiap perkataan (cth: Sunblock A -> SA)
            $initials = '';
            foreach ($words as $w) {
                $initials .= strtoupper(substr($w, 0, 1));
            }
        } else {
            // Jika satu perkataan, ambil 3 huruf pertama (cth: Sunblock -> SUN)
            $initials = strtoupper(substr($name, 0, 3));
        }

        // Cari batch terakhir yang bermula dengan singkatan + tahun yang sama
        $lastBatch = BatchModel::where('batch_number', 'LIKE', "{$initials}-{$year}-%")
            ->orderBy('batch_number', 'desc')
            ->first();

        if ($lastBatch) {
            $lastNumber = explode('-', $lastBatch->batch_number);
            $nextNumber = str_pad((int)end($lastNumber) + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '001';
        }

        return "{$initials}-{$year}-{$nextNumber}";
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $data = $request->only([
                'product_id', 
                'quantity', 
                'receive_date', 
                'expiry_date'
            ]);

            $data['uuid'] = Str::uuid();
            $data['created_by'] = auth()->id();
            $data['batch_number'] = $this->generateBatchNumber($request->product_id);

            BatchModel::create($data);

            $this->auditLogService->store([
                'action' => 'Create',
                'description' => 'Create new batch name ' . $data['batch_number'],
            ]); 

            DB::commit();
            return PageHelper::message('success', 'Successfully Added New Batch');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Batch Store Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to Add Batch');
        }
    }

    public function update($request, $batch)
    {
        DB::beginTransaction();

        try {
            $data = $request->only([
                'product_id', 
                'quantity', 
                'receive_date', 
                'expiry_date'
            ]);

            $batch->update($data);

            DB::commit();

            $this->auditLogService->store([
                'action' => 'Update',
                'description' => 'Update batch '. $batch->batch_number .' information',
            ]); 

            return PageHelper::message('success', 'Successfully Updated Batch');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Batch Update Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to Update Batch');
        }
    }

    public function delete($batch)
    {
        DB::beginTransaction();

        try {
            $batch_no = $batch->batch_number;

            $batch->delete();

            DB::commit();

            $this->auditLogService->store([
                'action' => 'Delete',
                'description' => 'Delete batch '. $batch_no .' information',
            ]); 

            return PageHelper::message('success', 'Successfully Deleted Batch');

        } catch (Exception $e) {
            Log::error('Batch Delete Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to Delete Batch');
        }
    }
}