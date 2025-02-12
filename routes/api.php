<?php
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\Auth\AuthApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/accounts')->group(function () {
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/login', [AuthApiController::class, 'login']);
});
Route::apiResource('/products', ApiProductController::class);