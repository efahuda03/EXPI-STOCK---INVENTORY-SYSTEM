<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessCodeModel extends Model
{
    protected $table = 'access_code';

    protected $fillable = [
        'code',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
