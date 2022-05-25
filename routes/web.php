<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function() {

        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/surat-masuk/verifikasi-surat/{id}', [SuratMasukController::class, 'verifikasi'])->name('surat-masuk.verifikasi');

        Route::get('/surat-masuk/cetak-disposisi-surat/{id}', [SuratMasukController::class, 'cetak_disposisi'])->name('surat-masuk.cetak-disposisi');

        Route::resource('surat-masuk', SuratMasukController::class);

        Route::resource('surat-keluar', SuratKeluarController::class);

        Route::resource('data-user', UserController::class);

        Route::resource('disposisi', DisposisiController::class);

    });

require __DIR__.'/auth.php';
