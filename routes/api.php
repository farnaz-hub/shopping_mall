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
    Route::post('/brand/save', [\App\Http\Controllers\Api\BrandController::class, 'save']);
    Route::get('/brand/list', [\App\Http\Controllers\Api\BrandController::class, 'list']);
    Route::post('/brand/update/{brand}', [\App\Http\Controllers\Api\BrandController::class, 'update']);
    Route::delete('/brand/delete/{brand}', [\App\Http\Controllers\Api\BrandController::class, 'delete']);
});
