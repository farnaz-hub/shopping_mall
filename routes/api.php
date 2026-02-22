<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//login
Route::post('/login', [\App\Http\Controllers\Api\LoginController::class, 'login']);

//logout
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\Api\LogoutController::class, 'logout']);

//brand
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('brand')->controller(\App\Http\Controllers\Api\BrandController::class)->group(function () {
        Route::post('/save', 'save');
        Route::get('/list', 'list');
        Route::post('/update/{brand}', 'update');
        Route::delete('/delete/{brand}', 'delete');
    });
});
