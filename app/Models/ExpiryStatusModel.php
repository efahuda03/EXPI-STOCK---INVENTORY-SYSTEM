<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpiryStatusModel extends Model
{
    protected $table = 'expiry_status';

    protected $guarded = ['id'];

    protected $fillable = [
        'uuid',
        'name',
        'min_day',
        'max_day',
        'priority',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
