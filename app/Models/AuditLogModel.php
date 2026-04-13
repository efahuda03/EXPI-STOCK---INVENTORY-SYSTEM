<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLogModel extends Model
{
    protected $table = 'audit_logs';

    protected $fillable = [
        'uuid',
        'user_id',
        'action',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
