<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dasbohard', [DashboardController::class, 'index'])->name('dashboard');

// route group /dokter
Route::group(['prefix' => 'dokter'], function () {
    Route::get('/pasien', [DokterController::class, 'show_pasien'])->name('show_pasien');
    Route::get('/tambah-pasien', [DokterController::class, 'add_pasien'])->name('add_pasien');


    Route::post('/store', function () {
        return redirect()->route('dokter.index');
    })->name('dokter.store');
});