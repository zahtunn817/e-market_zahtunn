<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AksesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DetailPembelianController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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


Route::get('/index', [DashboardController::class, 'index']);
Route::get('/blog', [DashboardController::class, 'blog']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

//* LOGIN
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//* LOGGED IN
Route::group(['middleware' => 'auth'], function () {

    //* All CAN ACCESS
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::get('/print', [PembelianController::class, 'print']);

    Route::resource('/produk', ProdukController::class);
    Route::resource('/barang',  BarangController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/akses', AksesController::class);
    Route::resource('/pemasok', PemasokController::class);
    Route::resource('/transaksiPembelian', PembelianController::class);
    Route::resource('/pelanggan', PelangganController::class);

    //* OWNER
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
    });
    //* ADMIN
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
    });
    //* PETUGAS
    Route::group(['middleware' => ['cekUserLogin:3']], function () {
    });
});
