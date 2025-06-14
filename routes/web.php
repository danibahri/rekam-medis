<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelepasanController;

// Route::redirect('/', '/login');
Route::get('/', [AuthController::class, 'landing'])->name('landing');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// check auth middleware
Route::middleware(AuthMiddleware::class)->group(function () {

    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // pasien
    Route::get('/pasien', [PasienController::class, 'show_pasien'])->name('show.pasien');
    Route::get('/profile/{id}/pasien', [PasienController::class, 'profile_pasien'])->name('profile.pasien');
    Route::get('/create/pasien', [PasienController::class, 'add_pasien'])->name('add.pasien');
    Route::post('/create/pasien', [PasienController::class, 'store_pasien'])->name('store.pasien');
    Route::get('/edit/{id}/pasien', [PasienController::class, 'edit_pasien'])->name('edit.pasien');
    Route::put('/update/{id}/pasien', [PasienController::class, 'update_pasien'])->name('update.pasien');
    Route::post('/delete-pasien/{id}', [PasienController::class, 'delete_pasien'])->name('delete.pasien');
    Route::post('/create-kunjungan/pasien', [PasienController::class, 'store_kunjungan'])->name('store-kunjungan.pasien');

    // pemeriksaan
    Route::get('/pemeriksaan-klinis/{id?}', [PemeriksaanController::class, 'index'])->name('show.pemeriksaan');

    // user
    Route::get('/user', [UserController::class, 'index'])->name('show.user');
    Route::get('/create/user', [UserController::class, 'add_user'])->name('add.user');
    Route::post('/create/user', [UserController::class, 'store_user'])->name('store.user');
    Route::post('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete.user');

    // Master Data Routes
    // Master Agama
    Route::get('/master/agama', [MasterController::class, 'agama'])->name('master.agama');
    Route::get('/master/agama/create', [MasterController::class, 'agama_create'])->name('master.agama.create');
    Route::post('/master/agama', [MasterController::class, 'agama_store'])->name('master.agama.store');
    Route::get('/master/agama/{id}/edit', [MasterController::class, 'agama_edit'])->name('master.agama.edit');
    Route::put('/master/agama/{id}', [MasterController::class, 'agama_update'])->name('master.agama.update');
    Route::delete('/master/agama/{id}', [MasterController::class, 'agama_destroy'])->name('master.agama.destroy');

    // Master Cara Pembayaran
    Route::get('/master/cara-pembayaran', [MasterController::class, 'cara_pembayaran'])->name('master.cara-pembayaran');
    Route::get('/master/cara-pembayaran/create', [MasterController::class, 'cara_pembayaran_create'])->name('master.cara-pembayaran.create');
    Route::post('/master/cara-pembayaran', [MasterController::class, 'cara_pembayaran_store'])->name('master.cara-pembayaran.store');
    Route::get('/master/cara-pembayaran/{id}/edit', [MasterController::class, 'cara_pembayaran_edit'])->name('master.cara-pembayaran.edit');
    Route::put('/master/cara-pembayaran/{id}', [MasterController::class, 'cara_pembayaran_update'])->name('master.cara-pembayaran.update');
    Route::delete('/master/cara-pembayaran/{id}', [MasterController::class, 'cara_pembayaran_destroy'])->name('master.cara-pembayaran.destroy');

    // Master Jenis Kelamin
    Route::get('/master/jenis-kelamin', [MasterController::class, 'jenis_kelamin'])->name('master.jenis-kelamin');
    Route::get('/master/jenis-kelamin/create', [MasterController::class, 'jenis_kelamin_create'])->name('master.jenis-kelamin.create');
    Route::post('/master/jenis-kelamin', [MasterController::class, 'jenis_kelamin_store'])->name('master.jenis-kelamin.store');
    Route::get('/master/jenis-kelamin/{id}/edit', [MasterController::class, 'jenis_kelamin_edit'])->name('master.jenis-kelamin.edit');
    Route::put('/master/jenis-kelamin/{id}', [MasterController::class, 'jenis_kelamin_update'])->name('master.jenis-kelamin.update');
    Route::delete('/master/jenis-kelamin/{id}', [MasterController::class, 'jenis_kelamin_destroy'])->name('master.jenis-kelamin.destroy');

    // Master Pekerjaan
    Route::get('/master/pekerjaan', [MasterController::class, 'pekerjaan'])->name('master.pekerjaan');
    Route::get('/master/pekerjaan/create', [MasterController::class, 'pekerjaan_create'])->name('master.pekerjaan.create');
    Route::post('/master/pekerjaan', [MasterController::class, 'pekerjaan_store'])->name('master.pekerjaan.store');
    Route::get('/master/pekerjaan/{id}/edit', [MasterController::class, 'pekerjaan_edit'])->name('master.pekerjaan.edit');
    Route::put('/master/pekerjaan/{id}', [MasterController::class, 'pekerjaan_update'])->name('master.pekerjaan.update');
    Route::delete('/master/pekerjaan/{id}', [MasterController::class, 'pekerjaan_destroy'])->name('master.pekerjaan.destroy');

    // Master Pendidikan
    Route::get('/master/pendidikan', [MasterController::class, 'pendidikan'])->name('master.pendidikan');
    Route::get('/master/pendidikan/create', [MasterController::class, 'pendidikan_create'])->name('master.pendidikan.create');
    Route::post('/master/pendidikan', [MasterController::class, 'pendidikan_store'])->name('master.pendidikan.store');
    Route::get('/master/pendidikan/{id}/edit', [MasterController::class, 'pendidikan_edit'])->name('master.pendidikan.edit');
    Route::put('/master/pendidikan/{id}', [MasterController::class, 'pendidikan_update'])->name('master.pendidikan.update');
    Route::delete('/master/pendidikan/{id}', [MasterController::class, 'pendidikan_destroy'])->name('master.pendidikan.destroy');

    // Master Status Pernikahan
    Route::get('/master/status-pernikahan', [MasterController::class, 'status_pernikahan'])->name('master.status-pernikahan');
    Route::get('/master/status-pernikahan/create', [MasterController::class, 'status_pernikahan_create'])->name('master.status-pernikahan.create');
    Route::post('/master/status-pernikahan', [MasterController::class, 'status_pernikahan_store'])->name('master.status-pernikahan.store');
    Route::get('/master/status-pernikahan/{id}/edit', [MasterController::class, 'status_pernikahan_edit'])->name('master.status-pernikahan.edit');
    Route::put('/master/status-pernikahan/{id}', [MasterController::class, 'status_pernikahan_update'])->name('master.status-pernikahan.update');
    Route::delete('/master/status-pernikahan/{id}', [MasterController::class, 'status_pernikahan_destroy'])->name('master.status-pernikahan.destroy');

    // Laporan Kunjungan
    Route::get('/laporan-kunjungan', [LaporanController::class, 'index'])->name('laporan.kunjungan');
    Route::get('/laporan/export/csv', [LaporanController::class, 'exportCsv'])->name('laporan.export.csv');

    // Pelepasan Informasi
    Route::get('/pelepasan-informasi', [PelepasanController::class, 'index'])->name('pelepasan.informasi');
    Route::get('/pelepasan-informasi/{id}', [PelepasanController::class, 'show_pdf'])->name('pelepasan.informasi.pdf');

    // persetujuan pasien
    Route::get('/persetujuan-pasien/{id}', [PelepasanController::class, 'persetujuan_pdf'])->name('persetujuan.pasien.pdf');
});
