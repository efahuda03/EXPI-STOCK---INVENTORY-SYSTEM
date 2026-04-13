<?php

namespace App\Helpers;

class ExpiryStatusHelper
{
    public static function badge($status_name)
    {
        return match($status_name){
            'Expired' => '<span class="badge bg-dark"><small>Expired</small></span>',
            'Critical' => '<span class="badge bg-danger"><small>Critical</small></span>',
            'Warning' => '<span class="badge bg-warning"><small>Warning</small></span>',
            default => '<span class="badge bg-success"><small>Good</small></span>',
        };
    }
}
