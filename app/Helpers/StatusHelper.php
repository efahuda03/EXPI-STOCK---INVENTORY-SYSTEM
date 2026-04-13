<?php

namespace App\Helpers;

class StatusHelper
{
    public static function list()
    {
        return [
            [
                'name' => 'Active',
                'value' => true,
            ],
            [
                'name' => 'Inactive',
                'value' => false,
            ],
        ];
    }

    public static function badge( $is_active)
    {
        return match($is_active){
            true => '<span class="badge bg-success"><small>Active</small></span>',
            default => '<span class="badge bg-danger"><small>Inactive</small></span>',
        };
    }
}
