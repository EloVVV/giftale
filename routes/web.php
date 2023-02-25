<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});


Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/#catalog', 'search')->name('search');
    Route::get('/auth', 'auth')->name('auth');
    Route::get('/reg', 'reg')->name('reg');

    Route::get('/users/{user:id}', 'user')->name('user');
    Route::get('/admin', 'user')->name('admin');

    Route::get('/single', 'single');

//    Route::get('/orders/create', 'order')->name('order.create');

    Route::middleware('auth')->get('/products/create', 'add')->name('product.create');
    Route::middleware('auth')->get('/products/{product:id}/update', 'update')->name('product.update');
});

Route::post('/orders/create', [OrderController::class, 'store'])->name('order.createPost');

Route::post('/products/create', [ProductController::class, 'store'])->name('product.createPost');
Route::post('/products/{product:id}/update', [ProductController::class, 'update'])->name('product.updatePost');
Route::get('/products/{product:id}/delete', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/products/{product:id}/block', [ProductController::class, 'setStatusBlocked'])->name('product.block');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('single');

Route::controller(AuthController::class)->group(function () {
    Route::post('/reg','reg')->name('regPost');
    Route::post('/auth','auth')->name('authPost');
    Route::get('/logout','logout')->name('logout');
});
