<?php

namespace App\Helpers;

class PageHelper
{
    public static function page(string $title, string $menu, string $submenu = null)
    {
        return ['title' => $title, 'menu' => $menu, 'submenu' => $submenu];
    }

    public static function message(string $status, string $text)
    {
        return ['status' => $status,'text' => $text];
    } 
}
