<?php

use App\Http\Controllers\ItemController;
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

Route::get('/', function () {  //Rute ini mengarahkan URL root (/) ke view welcome.
    return view('welcome');
});

Route::resource('items', ItemController::class); //Dengan menggunakan Route::resource, Laravel akan membuat semua rute yang diperlukan untuk operasi CRUD pada resource items berdasarkan controller ItemController. Ini secara otomatis akan membuat beberapa rute sebagai berikut:
