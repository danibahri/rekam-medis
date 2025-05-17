<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;



// Route::redirect('/', '/login');
Route::get('/', [AuthController::class, 'landing'])->name('landing');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// check auth middleware
Route::middleware(AuthMiddleware::class)->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pasien', [PasienController::class, 'show_pasien'])->name('show.pasien');
    Route::get('/create/pasien', [PasienController::class, 'add_pasien'])->name('add.pasien');
    Route::post('/create/pasien', [PasienController::class, 'store_pasien'])->name('store.pasien');
    Route::post('/delete-pasien/{id}', [PasienController::class, 'delete_pasien'])->name('delete.pasien');
    
    Route::get('/general-consent/{id}', [GeneralController::class, 'swow_general'])->name('show.general');

    // download pdf
    Route::get('/pdf/download', [GeneralController::class, 'download_pdf'])->name('download.pdf');
    // view pdf
    Route::get('/pdf/view', [GeneralController::class, 'view_pdf'])->name('view.pdf');

    Route::get('/user', [UserController::class, 'index'])->name('show.user');
    Route::get('/create/user', [UserController::class, 'add_user'])->name('add.user');
    Route::post('/create/user', [UserController::class, 'store_user'])->name('store.user');
    Route::post('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete.user');
});