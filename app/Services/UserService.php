<?php

namespace App\Services;

use App\Helpers\PageHelper;
use App\Models\AccessCodeModel;
use App\Models\AuditLogModel;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserService
{
    public function __construct(
        protected AuditLogService $auditLogService
    ) {}

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only(['name', 'email', 'phone_number', 'position']);
            
            $data['uuid'] = Str::uuid();
            $data['username'] = $request->phone_number;
            $data['password'] = Hash::make($request->phone_number);

            $user = User::create($data);
            $user->assignRole($request->role);

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Create',
                'description' => 'Create new user name ' . $data['name'],
            ]); 

            return PageHelper::message('success', 'Successfully Created New User');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Store Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to Create User');
        }
    }

    public function update($request, $user)
    {
        DB::beginTransaction();
        try {
            $data = $request->only(['name', 'email', 'phone_number', 'position', 'username', 'is_active']);
            
            // Update password hanya jika diisi
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $data['is_active'] = $request->has('is_active') ? $request->is_active : 0;

            $user->update($data);

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Update',
                'description' => 'Update user name ' . $data['name'] . ' information',
            ]); 

            return PageHelper::message('success', 'Successfully Updated User');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Update Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to Update User');
        }
    }

    public function delete($user)
    {
       
        try {
            $user_name = $user->name;

            $checkAccessCode = $user->accessCode()->exists();
            $checkAlertConfig = $user->alertConfigurations()->exists();
            
            if ($checkAlertConfig) {
                return PageHelper::message('error', 'Cannot delete user with existing in alert configurations');
            }

            DB::beginTransaction();
            
            if($checkAccessCode) {
                AccessCodeModel::where('user_id', $user->id)->delete();
            }

            AuditLogModel::where('user_id', $user->id)->delete();

            $user->delete();

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Delete',
                'description' => 'Delete user name ' . $user_name . ' information',
            ]); 

            return PageHelper::message('success', 'Successfully Deleted User');
            
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Delete Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to Delete User');
        }
    }
}