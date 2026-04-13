<?php

use App\Http\Controllers\AccessCodeController;
use App\Http\Controllers\AlertConfigurationController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpiryStatusController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// default
Route::get('/', function (){
    return redirect()->route('login');
});

// authentication
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/check', [AuthController::class, 'login'])->name('login.check');

// forgot password
Route::get('/forgot_password', [ForgotPasswordController::class, 'forgotPasswordView'])->name('forgot_password');
Route::post('/forgot_password', [ForgotPasswordController::class, 'sendResetEmail'])->name('forgot_password.send');

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');


Route::post('password/reset', [ForgotPasswordController::class, 'updatePassword'])
    ->name('password.update');

// after login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // category
    Route::resource('category', CategoryController::class)->except(['show']);

    // product
    Route::resource('product', ProductController::class)->except(['show']);

    // batch
    Route::resource('batch', BatchController::class);

    // user
    Route::resource('user', UserController::class);

    // expiry_status
    Route::resource('expiry_status', ExpiryStatusController::class);

    //audit log
    Route::get('audit_log', [AuditLogController::class, 'index'])->name('audit_log.index');
    Route::get('audit_log/{audit}/show', [AuditLogController::class, 'show'])->name('audit_log.show');

    // report
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/export-pdf', [ReportController::class, 'exportPdf'])->name('report.export-pdf');

    // notification
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::delete('notification/{uuid}', [NotificationController::class, 'destroy'])->name('notification.destroy');

    // access code
    Route::get('access_code', [AccessCodeController::class, 'index'])->name('access_code.index');
    Route::get('access_code/generate/{uuid}', [AccessCodeController::class, 'generate'])->name('access_code.generate');

    // alert configuration
    Route::get('alert_configuration', [AlertConfigurationController::class, 'index'])->name('alert_configuration.index');
    Route::get('alert_configuration/create', [AlertConfigurationController::class, 'create'])->name('alert_configuration.create');
    Route::post('alert_configuration', [AlertConfigurationController::class, 'store'])->name('alert_configuration.store');
    Route::delete('alert_configuration/{uuid}', [AlertConfigurationController::class, 'destroy'])->name('alert_configuration.destroy');

    // mark notification as read
    Route::get('notification/{uuid}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notification.mark-as-read');

});

