<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
////////////////////                   CATEGORY                  ////////////

Route::controller(CategoryController::class)->group(function () {
    Route::get('getAllCategory', 'index');
    Route::get('getCategoryDetails/{category}', 'show');
    Route::post('CreateCategory', 'store');
    Route::post('UpdateCategory/{category}', 'update');
    Route::delete('DeleteCategory/{category}', 'destroy');
});

/////////////////////            courses               ///////////////
use App\Http\Controllers\CourseController;

Route::controller(CourseController::class)->group(function () {
    Route::get('getAllcourses',  'index');
    Route::get('getCourseDetails/{id}',  'show');
    Route::get('getMy-courses',  'myCourses');
    Route::get('getEnded-courses',  'endedCourses');
    Route::post('createCourse', 'store');
    Route::post('updateCourse/{id}', 'update');
    Route::delete('deleteCourses/{id}', 'destroy');
});
