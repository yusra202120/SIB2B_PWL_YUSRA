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
use App\Http\Controllers\StokController;

use App\Http\Controllers\AuthController;

use App\Models\KategoriModel;
use Monolog\Level;

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {

        // Route Welcome
    Route::get('/', [WelcomeController::class, 'index']);


    // Route Products dengan Prefix
    Route::prefix('category')->group(function () {
        Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
        Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
        Route::get('/home-care', [ProductController::class, 'homeCare']);
        Route::get('/baby-kid', [ProductController::class, 'babyKid']);
    });

    Route::middleware(['authorize:ADM,MNG'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);              // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']);           // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);       // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);             // menyimpan data user baru
        
        Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']);        // Menyimpan data user baru Ajax

        Route::get('/{id}', [UserController::class, 'show']);           // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']);      // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);         // menyimpan perubahan data user
        
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);    // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax

        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form konfirmasi delete user Ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
        
        Route::delete('/{id}', [UserController::class, 'destroy']);     // menghapus data user
    });
});


    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::prefix('level')->group(function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);
            
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']);        // Menyimpan data user baru Ajax
            
            Route::get('/{id}', [LevelController::class, 'show']);           
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);    // Menampilkan halaman form edit user Ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form konfirmasi delete user Ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data user Ajax
            
            Route::delete('/{id}', [LevelController::class, 'destroy']);    

        });
    });

        Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
            Route::prefix('kategori')->group(function () {
                Route::get('/', [KategoriController::class, 'index']);
                Route::post('/list', [KategoriController::class, 'list']);
                Route::get('/create', [KategoriController::class, 'create']);
                Route::post('/', [KategoriController::class, 'store']);

                Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);        // Menampilkan halaman form tambah user Ajax
                Route::post('/ajax', [KategoriController::class, 'store_ajax']);              // Menyimpan data user baru Ajax

                Route::get('/{id}', [KategoriController::class, 'show']);
                Route::get('/{id}/edit', [KategoriController::class, 'edit']);
                Route::put('/{id}', [KategoriController::class, 'update']);

                Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);          // Menampilkan halaman form edit user Ajax
                Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);      // Menyimpan perubahan data user Ajax
                Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);     // Untuk tampilkan form konfirmasi delete user Ajax
                Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);   // Untuk hapus data user Ajax

                Route::delete('/{id}', [KategoriController::class, 'destroy']);
            });
        });

    Route::middleware(['authorize:ADM,MNG,STF,CUS'])->group(function () {
    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index']);
        Route::post('/list', [BarangController::class, 'list']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::post('/', [BarangController::class, 'store']);

        Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan form tambah barang via Ajax
        Route::post('/ajax', [BarangController::class, 'store_ajax']);        // Simpan data barang via Ajax

        Route::get('/{id}', [BarangController::class, 'show']);
        Route::get('/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/{id}', [BarangController::class, 'update']);

        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);         // Tampilkan form edit barang via Ajax
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);     // Simpan perubahan data barang via Ajax
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);    // Konfirmasi hapus barang via Ajax
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);  // Hapus data barang via Ajax

        Route::delete('/{id}', [BarangController::class, 'destroy']);

        Route::get('/import', [BarangController::class, 'import']); // ajax upload excel
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel

    });
});


    Route::group(['prefix' => 'stok'], function () {
        Route::get('/', [StokController::class, 'index']);          // menampilkan halaman awal stok
        Route::post('/list', [StokController::class, 'list']);      // menampilkan data stok dalam bentuk json untuk datatables
        Route::get('/create', [StokController::class, 'create']);   // menampilkan halaman form tambah stok
        Route::post('/', [StokController::class, 'store']);         // menyimpan data stok baru
        // JOBSHEET 6
        Route::get('/create_ajax', [StokController::class, 'create_ajax']);
        Route::post('/ajax', [StokController::class, 'store_ajax']);

        Route::get('/{id}', [StokController::class, 'show']);       // menampilkan detail stok
        Route::get('/{id}/edit', [StokController::class, 'edit']);  // menampilkan halaman form edit stok
        Route::put('/{id}', [StokController::class, 'update']);     // menyimpan perubahan data stok
        
        Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);

        Route::delete('/{id}', [StokController::class, 'destroy']); // menghapus data stok
    });

        // artinya semua route di dalam group ini harus login dulu

        // masukkan semua route yang perlu autentikasi di sini
});



