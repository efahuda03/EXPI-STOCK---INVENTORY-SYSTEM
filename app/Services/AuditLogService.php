<?php

namespace App\Services;

use App\Helpers\PageHelper;
use App\Models\AuditLogModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuditLogService
{
    public function store(array $data)
    {
        try
        {
            DB::beginTransaction();

            $data['uuid'] = Str::uuid();
            $data['user_id'] = isset($data['user_id']) ? $data['user_id'] : Auth::id();

            AuditLogModel::create($data);

            DB::commit();
        }
        catch (Exception $e) 
        {
            DB::rollBack();
            Log::error('Batch Update Error: ' . $e->getMessage());
        }
    }
}
