<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GlobalParameter\GlobalParameterController;
use App\Http\Controllers\GlobalParameter\GlobalParameterTypeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// authenticated
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::user();
});

// token required
Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::post('/register', 'register');
    });

    Route::controller(LogoutController::class)->group(function () {
        Route::post('/logout', 'logout');
    });

});



// token not required

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/{id}', 'show');
    Route::patch('/users/{id}', 'update');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/login-verify-otp/{id}', 'verify_otp');
});

Route::controller(GlobalParameterTypeController::class)->group(function () {
    Route::get('/global-parameter-type', 'index');
    Route::get('/global-parameter-type/{id}', 'show');
    Route::post('/global-parameter-type', 'store')->middleware('auth:sanctum');
    Route::patch('/global-parameter-type/{id}', 'update')->middleware('auth:sanctum');
});

Route::controller(GlobalParameterController::class)->group(function () {
    Route::post('/global-parameter', 'store')->middleware('auth:sanctum');
    Route::patch('/global-parameter/{id}', 'update')->middleware('auth:sanctum');
});
