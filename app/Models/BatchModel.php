<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchModel extends Model
{
    protected $table = 'batch';

    protected $fillable = [
        'uuid',
        'product_id',
        'batch_number',
        'quantity',
        'receive_date',
        'expiry_date',
        'created_by',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}
