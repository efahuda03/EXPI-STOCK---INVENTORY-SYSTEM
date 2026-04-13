<?php

namespace App\Helpers;

class RoleHelper
{
    public static function list()
    {
        return [
            [
                'name' => 'Admin',
                'value' => 'admin',
            ],
            [
                'name' => 'Staff',
                'value' => 'staff',
            ],
        ];
    }

    public static function badge(string $role)
    {
        return match($role){
            'admin' => '<span class="badge bg-primary"><small>Admin</small></span>',
            default => '<span class="badge bg-warning"><small>Staff</small></span>',
    };
    }
}
