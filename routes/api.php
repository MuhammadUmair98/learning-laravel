<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhoneController;
use Illuminate\Http\Request;
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

Route::get('/get-users', [UserController::class, 'index']);
Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);

Route::post('/store-user-phone', [UserPhoneController::class, 'store']);

Route::get('/get-user-phones', [UserPhoneController::class, 'index']);
