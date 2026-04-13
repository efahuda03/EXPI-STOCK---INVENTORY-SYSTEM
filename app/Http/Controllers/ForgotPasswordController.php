<?php

namespace App\Http\Controllers;

use App\Services\ForgotPasswordService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Helpers\PageHelper;
use Exception;

class ForgotPasswordController extends Controller
{
    public function __construct(
        protected ForgotPasswordService $forgotPasswordService
    ) {}

    public function forgotPasswordView()
    {
        $page = ['title' => 'FORGOT PASSWORD'];
        return view('forgot-password', compact('page'));
    }

    public function sendResetEmail(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email']);

        $response = $this->forgotPasswordService->sendResetLink($credentials);
        return back()->with($response['status'], $response['text']);
    }

    public function showResetForm(Request $request, $token)
    {
        $page = PageHelper::page('Reset Password', 'reset-password');

        // Kita hantar token dan email (dari URL) ke dalam View
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
            'page'  => $page
        ]);
    }

    /**
     * Proses kemaskini password baru ke database
     */
    public function updatePassword(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed', // 'confirmed' perlukan input 'password_confirmation'
        ]);

        try {
            // 2. Gunakan Facade Password untuk proses reset
            // Ia akan semak token sah atau tidak, dan email sepadan atau tidak
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();
                }
            );

            // 3. Jika berjaya, hantar ke login dengan mesej kejayaan
            if ($status == Password::PASSWORD_RESET) {
                return redirect()->route('login')->with('success', 'Your password has been reset successfully!');
            }

            // 4. Jika gagal (Token tamat tempoh/salah), hantar balik dengan ralat
            return back()->withErrors(['email' => [__($status)]]);

        } catch (Exception $e) {
            Log::error('Update Password Error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'An unexpected error occurred. Please try again.']);
        }
    }
}
