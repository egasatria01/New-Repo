<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\RawatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');

// Pasien
Route::resource('pasien', PasienController::class)->middleware('auth');
Route::get('pasien/delete/{id}', [PasienController::class, 'delete'])->middleware('auth');


// Spesialis
Route::resource('spesialis', SpesialisController::class)->middleware('auth');
Route::get('spesialis/delete/{id}', [SpesialisController::class, 'delete'])->middleware('auth');

// Kamar
Route::resource('kamar', KamarController::class)->middleware('auth');
Route::get('kamar/delete/{no}', [KamarController::class, 'delete'])->middleware('auth');

// Dokter
Route::resource('dokter', DokterController::class)->middleware('auth');

// Hasil
Route::resource('hasil', HasilController::class)->middleware('auth');

// Rawat
Route::resource('rawat', RawatController::class)->middleware('auth');

// Pembayaran
Route::resource('pembayaran', PembayaranController::class)->middleware('auth');

// Laporan
Route::resource('laporan', LaporanController::class)->middleware('is_admin');
Route::get('admin/print_pasien', [PasienController::class, 'print_pasiens'])->name('admin.print.pasien')->middleware('is_admin');

//Export && Import Pasien
Route::get('admin/pasien/export', [PasienController::class, 'export'])->name('admin.pasien.export')->middleware('is_admin');
Route::post('admin/laporan/import', [PasienController::class, 'import'])->name('admin.laporan.import')->middleware('is_admin');