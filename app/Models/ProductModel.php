<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'uuid',
        'category_id',
        'name',
        'brand',
        'retail_price',
        'supplier_name',
        'supplier_contact',
        'is_active',
        'description',
        'image',
        'created_by',
    ];

    protected $casts = [
        'retail_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
