<?php

namespace App\Services;
use App\Helpers\PageHelper;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordService
{
    public function sendResetLink(array $data)
    {
        try 
        {
            // $data selalunya mengandungi ['email' => 'user@example.com']
            $status = Password::sendResetLink($data);

            if ($status !== Password::RESET_LINK_SENT) {
                // Ini akan handle error seperti 'user not found' atau 'throttled'
                return PageHelper::message('error', __($status));
            }

            return PageHelper::message('success', 'A password reset link has been sent to your email.');
        } 
        catch (Exception $e) 
        {
            // Rekod error dalam storage/logs/laravel.log jika SMTP gagal
            Log::error('Password Reset Email Error: ' . $e->getMessage());
            return PageHelper::message('error', 'Failed to send email. Please try again later.');
        }
    }
}
