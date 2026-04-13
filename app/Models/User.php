<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone_number',
        'position',
        'username',
        'password',
        'is_active',
        'last_login_at',
        'email_verified_at', // Tambah ini untuk simpan tarikh verify
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token', // WAJIB tambah ini supaya token tidak terdedah dalam API/JSON
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_active' => 'boolean',
            'email_verified_at' => 'datetime', // Cast supaya jadi Carbon object
            'last_login_at' => 'datetime',
        ];
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function accessCode()
    {
        return $this->hasOne(AccessCodeModel::class, 'user_id');
    }

    public function alertConfigurations()
    {
        return $this->hasMany(AlertConfigurationModel::class, 'user_id');
    }
}