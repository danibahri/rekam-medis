<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// route group /dokter
Route::group(['prefix' => 'dokter'], function () {
    Route::get('/pasien', [PasienController::class, 'show_pasien'])->name('show.pasien');
    Route::get('/create/pasien', [PasienController::class, 'add_pasien'])->name('add.pasien');
    Route::post('/create/pasien', [PasienController::class, 'store_pasien'])->name('store.pasien');
    Route::post('/delete-pasien/{id}', [PasienController::class, 'delete_pasien'])->name('delete.pasien');

    Route::get('/user', [UserController::class, 'index'])->name('show.user');
    Route::get('/create/user', [UserController::class, 'add_user'])->name('add.user');
    Route::post('/create/user', [UserController::class, 'store_user'])->name('store.user');
    Route::post('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete.user');
});