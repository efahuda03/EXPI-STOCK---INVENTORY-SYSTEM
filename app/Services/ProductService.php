<?php

namespace App\Services;

use App\Helpers\PageHelper;
use App\Models\ProductModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(
        protected AuditLogService $auditLogService
    ) {}

    public function store(object $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->only([
                'category_id', 
                'name', 
                'brand', 
                'retail_price', 
                'supplier_name', 
                'supplier_contact', 
                'description'
            ]);

            $data['uuid'] = Str::uuid();
            $data['created_by'] = Auth::id();

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('products', 'public');
                $data['image'] = $path;
            }

            ProductModel::create($data);

            DB::commit();

            // audit log
            $this->auditLogService->store([
                'action' => 'Create',
                'description' => 'Create new product name ' . $data['name'],
            ]); 

            return PageHelper::message('success', 'Successfully Create Product');

        } catch (Exception $e) {
            DB::rollBack();

            // Delete uploaded image if database fails
            if (isset($data['image'])) {
                Storage::disk('public')->delete($data['image']);
            }

            // Log the error for debugging
            Log::error('Product Store Error: ' . $e->getMessage());

            return PageHelper::message('error', 'Failed Create Product');
        }
    }

    public function update($request, $product)
    {
        DB::beginTransaction();

        try {
            $data = $request->only([
                'category_id', 
                'name', 
                'brand', 
                'retail_price', 
                'supplier_name', 
                'supplier_contact', 
                'is_active', 
                'description'
            ]);

            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                // Store the new image
                $path = $request->file('image')->store('products', 'public');
                $data['image'] = $path;
            }

            $product->update($data);

            DB::commit();

            $this->auditLogService->store([
                'action' => 'Update',
                'description' => 'Update product ' . $data['name'] .' information',
            ]); 

            return PageHelper::message('success', 'Successfully Updated Product');

        } catch (Exception $e) {
            DB::rollBack();

            // If a new image was uploaded but DB failed, delete the new one
            if (isset($data['image'])) {
                Storage::disk('public')->delete($data['image']);
            }

            Log::error('Product Update Error: ' . $e->getMessage());

            return PageHelper::message('error', 'Failed to Update Product');
        }
    }

    public function delete($product)
    {
        DB::beginTransaction();

        try {
            $imagePath = $product->image;
            $product_name = $product->name;

            $product->delete();

            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            DB::commit();

            $this->auditLogService->store([
                'action' => 'Delete',
                'description' => 'Delete product ' . $product_name .' information',
            ]); 

            return PageHelper::message('success', 'Successfully Deleted Product');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Product Delete Error: ' . $e->getMessage());

            return PageHelper::message('error', 'Failed to Delete Product');
        }
    }
}
