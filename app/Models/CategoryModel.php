<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{   
    protected $table = 'category';

    protected $guarded = ['id'];

    protected $fillable = [
        'uuid',
        'name',
    ];

    public function product()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
