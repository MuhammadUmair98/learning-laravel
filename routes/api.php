<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLaptopController;
use App\Http\Controllers\UserPhoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/store-user', [UserController::class, 'store']);

Route::get('/get-user/{id}', [UserController::class, 'show']);

Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);

Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('status.checker')->group(function () {
        Route::get('/get-users', [UserController::class, 'index']);
    });

    Route::get('/me', function (Request $request) {
        return response()->json(['user' =>  $request->user()]);
    });
});


Route::post('/store-user-phone', [UserPhoneController::class, 'store']);

Route::get('/get-user-phones', [UserPhoneController::class, 'index']);

Route::post('/store-user-laptop', [UserLaptopController::class, 'store']);

Route::post('/store-user-laptop', [UserLaptopController::class, 'store']);

Route::delete('/delete-user-laptop/{id}', [UserLaptopController::class, 'destroy']);

Route::get('/get-laptops', [UserLaptopController::class, 'index']);

Route::get('/get-laptop/{id}', [UserLaptopController::class, 'show']);

Route::post('/store-charger', [UserLaptopController::class, 'storeCharger']);

Route::post('/store-phone-charger', [UserPhoneController::class, 'storeCharger']);
