<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Models\User;
use Illuminate\Http\Request;

class AccessCodeController extends Controller
{
    public function index()
    {
        $listAccessCode = User::whereHas('roles', function($query) {
                            $query->where('name', 'admin');
                        })
                        ->leftJoin('access_code', 'users.id', '=', 'access_code.user_id')
                        ->select('users.name', 'users.uuid', 'access_code.code', 'access_code.updated_at')
                        ->get();

        $page = PageHelper::page('Access Code', 'access_code');
        return view('access_code', compact('page', 'listAccessCode'));
    }

    public function generate($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $user->accessCode()->updateOrCreate(
            ['user_id' => $user->id],
            ['code' => $this->generateRandomCode()]
        );

        return redirect()->route('access_code.index')->with('success', 'Access code generated successfully.');
    }

    public function generateRandomCode($length = 8)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
