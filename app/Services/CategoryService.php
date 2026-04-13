<?php

namespace App\Services;

use App\Helpers\PageHelper;
use App\Models\CategoryModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryService
{
    public function __construct(
        protected AuditLogService $auditLogService
    ) {}

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $data = $request->only(['name']);
            $data['uuid'] = Str::uuid();

            CategoryModel::create($data);

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Create',
                'description' => 'Create new category name ' . $data['name'],
            ]); 

            return PageHelper::message('success', 'Successfully Created Category');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Category Store Error: ' . $e->getMessage());

            return PageHelper::message('error', 'Failed to Create Category');
        }
    }

    public function update($request, $category)
    {
        DB::beginTransaction();

        try {
            $data = $request->only(['name']);

            $category->update($data);

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Update',
                'description' => 'Update category '. $category->name .' information',
            ]); 

            return PageHelper::message('success', 'Successfully Updated Category');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Category Update Error: ' . $e->getMessage());

            return PageHelper::message('error', 'Failed to Update Category');
        }
    }

    public function delete($category)
    {
        DB::beginTransaction();

        try {
            // Check if category has products before deleting (Optional)
            if ($category->product()->count() > 0) {
                return PageHelper::message('error', 'Cannot delete category that has products');
            }

            $category_name = $category->name;

            $category->delete();

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Delete',
                'description' => 'Delete category '. $category_name .' information',
            ]); 

            return PageHelper::message('success', 'Successfully Deleted Category');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Category Delete Error: ' . $e->getMessage());

            return PageHelper::message('error', 'Failed to Delete Category');
        }
    }
}
