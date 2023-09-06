<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanBakuControllers;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaControllers;


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

Route::get('/', function () {
    // return redirect()->to('/login');
    return view('/login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('bahanbaku', BahanBakuControllers::class);
Route::resource('barang_masuk', BarangMasukController::class);
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/cari', [BarangMasukController::class, 'cari']);
Route::get('/welcome', [BerandaControllers::class, 'index']);
Route::get('/report', [BahanBakuControllers::class, 'report']);


