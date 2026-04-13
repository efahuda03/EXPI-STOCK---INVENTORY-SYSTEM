<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function loginView()
    {
        $page = ['title' => 'LOGIN'];
        return view('login', compact('page'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['nullable', 'string'],
            'password' => ['nullable'],
            'access_code' => ['nullable'],
        ]);

        $login = $this->authService->authenticate($credentials);
        $route = ($login['status'] == 'success') ? redirect()->intended('/dashboard') : back();

        return $route->with($login['status'], $login['text']);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect('/login');
    }
}
