<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\UndanganDisposisiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
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

        Route::get('/undangan/cari-surat', [UndanganController::class, 'cari_surat'])->name('undangan.cari-surat');

        Route::get('/undangan/verifikasi-undangan/{id}', [UndanganController::class, 'verifikasi'])->name('undangan.verifikasi');

        Route::get('/undangan/cetak-disposisi-undangan/{id}', [UndanganController::class, 'cetak_disposisi'])->name('undangan.cetak-disposisi');

        Route::get('/undangan/cetak-semua-laporan', [UndanganController::class, 'cetak_semua'])->name('undangan.cetak-semua');

        Route::get('/undangan/cetak-laporan-berdasarkan-tanggal', [UndanganController::class, 'cetak_tanggal'])->name('undangan.cetak-tanggal');

        Route::resource('undangan', UndanganController::class);

        Route::resource('visi-misi', VisiMisiController::class);

        Route::resource('data-user', UserController::class);

        Route::resource('surat-masuk-disposisi', SuratMasukDisposisiController::class);

        Route::resource('undangan-disposisi', UndanganDisposisiController::class);

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

        Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

        Route::get('/cek-api-no-agenda-surat-masuk', [APIController::class, 'cek_no_agenda_surat_masuk'])->name('cek-api.no-agenda-surat-masuk');

        Route::get('/cek-api-no-agenda-surat-keluar', [APIController::class, 'cek_no_agenda_surat_keluar'])->name('cek-api.no-agenda-surat-keluar');

        Route::get('/cek-api-no-urut-undangan', [APIController::class, 'cek_no_urut_undangan'])->name('cek-api.no-urut-undangan');

    });

require __DIR__.'/auth.php';
