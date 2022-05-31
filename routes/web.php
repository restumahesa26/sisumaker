<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/scan-surat', [HomeController::class, 'scan'])->name('scan');

Route::get('/detail-surat/{kode_unik}', [HomeController::class, 'detail'])->name('detail');

Route::get('/scanning', [HomeController::class, 'scanning'])->name('scanning');

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function() {

        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/surat-masuk/verifikasi-surat/{id}', [SuratMasukController::class, 'verifikasi'])->name('surat-masuk.verifikasi');

        Route::get('/surat-masuk/cetak-disposisi-surat/{id}', [SuratMasukController::class, 'cetak_disposisi'])->name('surat-masuk.cetak-disposisi');

        Route::get('/surat-masuk/cetak-semua-laporan', [SuratMasukController::class, 'cetak_semua'])->name('surat-masuk.cetak-semua');

        Route::get('/surat-masuk/cari-surat', [SuratMasukController::class, 'cari_surat'])->name('surat-masuk.cari-surat');

        Route::get('/surat-masuk/cetak-laporan-berdasarkan-tanggal', [SuratMasukController::class, 'cetak_tanggal'])->name('surat-masuk.cetak-tanggal');

        Route::resource('surat-masuk', SuratMasukController::class);

        Route::get('/surat-keluar/cetak-semua-laporan', [SuratKeluarController::class, 'cetak_semua'])->name('surat-keluar.cetak-semua');

        Route::get('/surat-keluar/cari-surat', [SuratKeluarController::class, 'cari_surat'])->name('surat-keluar.cari-surat');

        Route::get('/surat-keluar/cetak-laporan-berdasarkan-tanggal', [SuratKeluarController::class, 'cetak_tanggal'])->name('surat-keluar.cetak-tanggal');

        Route::resource('surat-keluar', SuratKeluarController::class);

        Route::resource('data-user', UserController::class);

        Route::resource('disposisi', DisposisiController::class);

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    });

require __DIR__.'/auth.php';
