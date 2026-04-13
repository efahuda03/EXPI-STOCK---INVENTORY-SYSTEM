<?php

namespace App\Services;

use App\Helpers\PageHelper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(
        protected AuditLogService $auditLogService
    ) {}

    public function authenticate(array $credentials)
    {
        if (!empty($credentials['access_code'])) {
            $user = User::whereHas('accessCode', function($query) use ($credentials) {
                $query->where('code', $credentials['access_code']);
            })->first();

            if (!$user) {
                return PageHelper::message('error', 'Access code invalid');
            }

            Auth::login($user);

        } else {
            $data = ['username' => $credentials['username'], 'password' => $credentials['password']];
            if (!Auth::attempt($data)) {
                return PageHelper::message('error', 'Username or password invalid');
            }
        }

        $user = Auth::user();

        if (!$user->is_active) {
            Auth::logout();
            return PageHelper::message('error', 'Your account is inactive. Please contact the admin.');
        }

        $this->auditLogService->store([
            'user_id' => $user->id,
            'action' => 'Login',
            'description' => 'Login to system',
        ]); 

        session()->regenerate();
        return PageHelper::message('success', 'Successfully Login.');
    }

    public function logout(): void
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
    }
}
