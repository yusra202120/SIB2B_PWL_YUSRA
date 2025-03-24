<?php

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


use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;


// Route Welcome
Route::get('/', [WelcomeController::class, 'index']);


// Route Products dengan Prefix
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);              // menampilkan halaman awal user
    Route::get('/list', [UserController::class, 'list']);           // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);       // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);             // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);           // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);      // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);         // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);     // menghapus data user
});


Route::prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::get('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);           
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::get('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});


