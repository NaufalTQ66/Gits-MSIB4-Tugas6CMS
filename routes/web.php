<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', [CartController::class, 'index']);

// Register
Route::get('/register', [AuthController::class, 'rindex']);
Route::post('/register', [AuthController::class, 'rstore']);

// Login
Route::get('/login', [AuthController::class, 'lindex'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {

    // Detail Cart
    Route::get('/detail/{id}', [CartController::class, 'dcart']);
    Route::post('/pesan/{id}', [CartController::class, 'pesan']);
    Route::get('/check-out', [CartController::class, 'check_out']);
    Route::get('/konfirmasi', [CartController::class, 'konfirmasi']);
    Route::get('/check-out/{id}/delete', [CartController::class, 'delete']);

    // produk
    Route::resource('/product', ProductController::class);

    // kategori
    Route::resource('/category', CategoryController::class);
});
