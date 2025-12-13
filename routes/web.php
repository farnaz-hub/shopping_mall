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

Route::get('/user/add', [\App\Http\Controllers\UserController::class, 'add'])->name('user.add');
Route::post('/user/save', [\App\Http\Controllers\UserController::class, 'save'])->name('user.save');
Route::get('/user/list', [\App\Http\Controllers\UserController::class, 'list'])->name('user.list');
Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('/user/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::get('/brand/add', [\App\Http\Controllers\BrandController::class, 'add'])->name('brand.add');
Route::post('/brand/save', [\App\Http\Controllers\BrandController::class, 'save'])->name('brand.save');
Route::get('/brand/list', [\App\Http\Controllers\BrandController::class, 'list'])->name('brand.list');
Route::get('/brand/{brand}', [\App\Http\Controllers\BrandController::class, 'show'])->name('brand.show');
Route::post('/brand/update/{brand}', [\App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
Route::get('/brand/delete/{brand}', [\App\Http\Controllers\BrandController::class, 'delete'])->name('brand.delete');

Route::get('/product/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('product.add');
Route::post('/product/save', [\App\Http\Controllers\ProductController::class, 'save'])->name('product.save');
Route::get('/product/list', [\App\Http\Controllers\ProductController::class, 'list'])->name('product.list');
Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::post('/product/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{product}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'enter'])->name('home');
