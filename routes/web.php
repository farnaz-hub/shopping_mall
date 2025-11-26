<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer/add', [\App\Http\Controllers\CustomerController::class, 'add'])->name('customer.add');
Route::post('/customer/save', [\App\Http\Controllers\CustomerController::class, 'save'])->name('customer.save');
Route::get('/customer/list', [\App\Http\Controllers\CustomerController::class, 'list'])->name('customer.list');
Route::get('/customer/{customer}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
Route::post('/customer/update/{customer}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{customer}', [\App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');
