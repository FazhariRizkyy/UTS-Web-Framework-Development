<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UsersController::class)->middleware('auth');
Route::resource('destinasi', DestinasiController::class)->middleware('auth');
Route::resource('paket', PaketController::class)->middleware('auth');
Route::resource('fasilitas', FasilitasController::class)->middleware('auth');
Route::resource('booking', BookingController::class)->middleware('auth');
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
Route::resource('riwayat', RiwayatController::class)->middleware('auth');
Route::resource('laporan', LaporanController::class)->middleware('auth');

require __DIR__.'/auth.php';