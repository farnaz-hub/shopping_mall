<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'enter'])->name('home');


//login
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'form'])->name('login.form');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.login');


//logout
Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');


//customer
Route::get('/customer/add', [\App\Http\Controllers\CustomerController::class, 'add'])->name('customer.add');
Route::post('/customer/save', [\App\Http\Controllers\CustomerController::class, 'save'])->name('customer.save');
Route::get('/customer/list', [\App\Http\Controllers\CustomerController::class, 'list'])->name('customer.list');
Route::get('/customer/{customer}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
Route::post('/customer/update/{customer}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{customer}', [\App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');


//user
Route::get('/user/add', [\App\Http\Controllers\UserController::class, 'add'])->name('user.add');
Route::post('/user/save', [\App\Http\Controllers\UserController::class, 'save'])->name('user.save');
Route::get('/user/list', [\App\Http\Controllers\UserController::class, 'list'])->name('user.list');
Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('/user/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');


//product
Route::get('/product/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('product.add');
Route::post('/product/save', [\App\Http\Controllers\ProductController::class, 'save'])->name('product.save');
Route::get('/product/list', [\App\Http\Controllers\ProductController::class, 'list'])->name('product.list');
Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::post('/product/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{product}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');


//brand
Route::get('/brand/add', [\App\Http\Controllers\BrandController::class, 'add'])->name('brand.add');
Route::post('/brand/save', [\App\Http\Controllers\BrandController::class, 'save'])->name('brand.save');
Route::get('/brand/list', [\App\Http\Controllers\BrandController::class, 'list'])->name('brand.list');
Route::get('/brand/{brand}', [\App\Http\Controllers\BrandController::class, 'show'])->name('brand.show');
Route::post('/brand/update/{brand}', [\App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
Route::get('/brand/delete/{brand}', [\App\Http\Controllers\BrandController::class, 'delete'])->name('brand.delete');


//ticket
Route::get('/ticket/add', [\App\Http\Controllers\TicketController::class, 'add'])->name('ticket.add');
Route::post('/ticket/save', [\App\Http\Controllers\TicketController::class, 'save'])->name('ticket.save');
Route::get('/ticket/list', [\App\Http\Controllers\TicketController::class, 'list'])->name('ticket.list');
Route::get('/ticket/{ticket}', [\App\Http\Controllers\TicketController::class, 'show'])->name('ticket.show');
Route::post('/ticket/update/{ticket}', [\App\Http\Controllers\TicketController::class, 'update'])->name('ticket.update');
Route::get('/ticket/delete/{ticket}', [\App\Http\Controllers\TicketController::class, 'delete'])->name('ticket.delete');


//message
Route::post('/message/save/{ticket}', [\App\Http\Controllers\MessageController::class, 'save'])->name('message.save');
Route::get('/message/{ticket}', [\App\Http\Controllers\MessageController::class, 'list'])->name('message.list');
Route::delete('/message/delete/{message}', [\App\Http\Controllers\MessageController::class, 'delete'])->name('message.delete');


//type
Route::get('/type/add', [\App\Http\Controllers\TypeController::class, 'add'])->name('type.add');
Route::post('/type/save', [\App\Http\Controllers\TypeController::class, 'save'])->name('type.save');
Route::get('/type/list', [\App\Http\Controllers\TypeController::class, 'list'])->name('type.list');
Route::get('/type/{type}', [\App\Http\Controllers\TypeController::class, 'show'])->name('type.show');
Route::post('/type/update/{type}', [\App\Http\Controllers\TypeController::class, 'update'])->name('type.update');
Route::get('/type/delete/{type}', [\App\Http\Controllers\TypeController::class, 'delete'])->name('type.delete');


//category
Route::get('/category/add', [\App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
Route::post('/category/save', [\App\Http\Controllers\CategoryController::class, 'save'])->name('category.save');
Route::get('/category/list', [\App\Http\Controllers\CategoryController::class, 'list'])->name('category.list');
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::post('/category/update/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');


//address
Route::get('/address/add/{customer}', [\App\Http\Controllers\AddressController::class, 'add'])->name('address.add');
Route::post('/address/save/{customer}', [\App\Http\Controllers\AddressController::class, 'save'])->name('address.save');
Route::get('/address/list/{customer}', [\App\Http\Controllers\AddressController::class, 'list'])->name('address.list');
Route::get('/address/{address}', [\App\Http\Controllers\AddressController::class, 'show'])->name('address.show');
Route::post('/address/update/{address}', [\App\Http\Controllers\AddressController::class, 'update'])->name('address.update');
Route::delete('/address/delete/{address}', [\App\Http\Controllers\AddressController::class, 'delete'])->name('address.delete');


//task
Route::get('/task/add', [\App\Http\Controllers\TaskController::class, 'add'])->name('task.add');
Route::post('/task/save', [\App\Http\Controllers\TaskController::class, 'save'])->name('task.save');
Route::get('/task/list', [\App\Http\Controllers\TaskController::class, 'list'])->name('task.list');
Route::get('/task/{task}', [\App\Http\Controllers\TaskController::class, 'show'])->name('task.show');
Route::post('/task/update/{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
Route::get('/task/delete/{task}', [\App\Http\Controllers\TaskController::class, 'delete'])->name('task.delete');


//idea
Route::post('/idea/save/{task}', [\App\Http\Controllers\IdeaController::class, 'save'])->name('idea.save');
Route::get('/idea/{task}', [\App\Http\Controllers\IdeaController::class, 'list'])->name('idea.list');
Route::delete('/idea/delete/{idea}', [\App\Http\Controllers\IdeaController::class, 'delete'])->name('idea.delete');
