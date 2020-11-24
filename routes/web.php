<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::redirect('', 'dashboard', 301);

/**
 * App core routes:
 * all are protected with auth and verified middleware
 * auth middleware -> check user session
 * verified middleware -> check user has email verified
 */
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

});

/**
 * Auth routes
 */

 // Login
 Route::get('/sign-in', function(){ return view('auth.sign-in'); })->middleware(['guest'])->name('login');

 Route::post('/sign-in', [AuthController::class, 'login'])->name('login');

 // Register
 Route::get('/sign-up', function(){ return view('auth.sign-up'); })->middleware(['guest'])->name('register');

 Route::post('/sign-up', [AuthController::class, 'register'])->name('register');

 // Logout
 Route::post('/sign-out', [AuthController::class, 'logout'])->name('logout');


/**
 * Helper users routes 
 */

 // Forgot & reset Password
Route::get('/forgot-password', function(){ return view('auth.forgot-password'); })->middleware(['guest'])->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgot_password'])->middleware(['guest'])->name('password.email');

Route::get('/reset-password/{token}', function ($token) {return view('auth.reset-password', ['token' => $token]); })->middleware(['guest'])->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'reset_password'])->middleware(['guest'])->name('password.update');

// Email verify
Route::get('/email/verify', function () { return view('auth.verify-email'); })->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect()->route('dashboard');

})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');

})->middleware(['auth', 'throttle:6,1'])->name('verification.send');