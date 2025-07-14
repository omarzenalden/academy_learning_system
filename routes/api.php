<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticationController::class)->group(function(){
   Route::post('sign_up','sign_up');
   Route::post('sign_in','sign_in');
   Route::get('logout','logout')->middleware('auth:sanctum');
   Route::get('spatie','roles')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function (){
    // Email verification notice
    Route::get('email/verify', function (){
      return response()->json(['message' => 'Verify your email address']);
    }) -> name('verification.notice');

    // Email verification handler
    Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
     $request->fulfill();
     return response()->json(['message' => 'Email verified successfully']);
    })->middleware('signed')->name('verification.verify');

    // Resend verification email
    Route::post('email/resend', function (Request $request){
        $request->user()->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification email resent.']);
    })->middleware('throttle:6,1')->name('verification.resend');
});


Route::controller(ResetPasswordController::class)->group(function(){
   Route::post('/send_code', 'send_reset_password_code');
   Route::post('/check_code', 'check_reset_code');
   Route::post('/resend_code', 'resend_reset_code');
   Route::post('/reset_password', 'set_new_password');
});
