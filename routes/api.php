<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatasController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\DrainaseController;
use App\Http\Controllers\JalanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TanahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/cek', function () {
        return Auth::user();
    });
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::name('drainase.')->group(function () {
        Route::get('drainase', [DrainaseController::class, 'index'])->name('all');
        Route::post('drainase', [DrainaseController::class, 'store'])->name('add');
        Route::get('drainase/{id}', [DrainaseController::class, 'show'])->name('show');
        Route::post('drainase/{id}', [DrainaseController::class, 'update'])->name('update');
        Route::delete('drainase/{id}', [DrainaseController::class, 'destroy'])->name('remove');
    });

    Route::name('jalan.')->group(function () {
        Route::get('jalan', [JalanController::class, 'index'])->name('all');
        Route::post('jalan', [JalanController::class, 'store'])->name('add');
        Route::get('jalan/{id}', [JalanController::class, 'show'])->name('show');
        Route::put('jalan/{id}', [JalanController::class, 'update'])->name('update');
        Route::delete('jalan/{id}', [JalanController::class, 'destroy'])->name('remove');
    });

    Route::name('beranda.')->group(function () {
        Route::get('beranda', [BerandaController::class, 'index'])->name('first');
        Route::post('beranda', [BerandaController::class, 'store'])->name('add');
        Route::post('beranda', [BerandaController::class, 'update'])->name('update');
        Route::delete('beranda/{id}', [BerandaController::class, 'destroy'])->name('remove');
    });


    Route::name('disclaimer.')->group(function () {
        Route::get('disclaimer', [DisclaimerController::class, 'index'])->name('all');
        Route::post('disclaimer', [DisclaimerController::class, 'store'])->name('add');
        Route::put('disclaimer', [DisclaimerController::class, 'update'])->name('update');
        Route::delete('disclaimer/{id}', [DisclaimerController::class, 'destroy'])->name('remove');
    });

    Route::name('slider.')->group(function () {
        Route::get('slider', [SliderController::class, 'index'])->name('all');
        Route::post('slider', [SliderController::class, 'store'])->name('add');
        Route::get('slider/{id}', [SliderController::class, 'show'])->name('show');
        Route::delete('slider/{id}', [SliderController::class, 'destroy'])->name('remove');
    });


    Route::name('tanah-lahan.')->group(function () {
        Route::get('tanah-lahan', [TanahController::class, 'index'])->name('all');
        Route::post('tanah-lahan', [TanahController::class, 'store'])->name('add');
        Route::get('tanah-lahan/{id}', [TanahController::class, 'show'])->name('show');
        Route::post('tanah-lahan/{id}', [TanahController::class, 'update'])->name('update');
        Route::delete('tanah-lahan/{id}', [TanahController::class, 'destroy'])->name('remove');

        Route::post('tanah-lahan/{id}/upload-file-sertifikat', [TanahController::class, 'uploadFileSertifikat'])->name('upload-file-sertifikat');
    });

    Route::name('tanah-lahan.')->group(function () {
        Route::get('tanah-lahan', [TanahController::class, 'index'])->name('all');
        Route::post('tanah-lahan', [TanahController::class, 'store'])->name('add');
        Route::get('tanah-lahan/{id}', [TanahController::class, 'show'])->name('show');
        Route::post('tanah-lahan/{id}', [TanahController::class, 'update'])->name('update');
        Route::delete('tanah-lahan/{id}', [TanahController::class, 'destroy'])->name('remove');

        Route::get('tanah/luas-tanah-kecamatan', [TanahController::class, 'getDataLuasKecamatan'])->name('luas-tanah-kecamatan');
        Route::get('tanah/luas-tanah-kelurahan', [TanahController::class, 'getDataLuasKelurahan'])->name('luas-tanah-kelurahan');
        Route::get('tanah/lahan-terbangun', [TanahController::class, 'getLahanTerbangunPercentage'])->name('lahan-terbangun');
        Route::get('tanah/legalitas', [TanahController::class, 'getLegalitasAsetPercentage'])->name('legalitas');
        Route::get('tanah/pemegang-hak', [TanahController::class, 'getPemegangHakPercentage'])->name('pemegang-hak');
        Route::get('tanah/pola-ruang', [TanahController::class, 'getBerdasarkanPolaRuang'])->name('pola-ruang');
        Route::get('tanah/papan-nama', [TanahController::class, 'getBerdasarkanKeberadaanPapanNamaPemkotPercentage'])->name('papan-nama');
        Route::get('tanah/patok', [TanahController::class, 'getBerdasarkanKeberadaanPatokBatasTanahPercentage'])->name('patok');
    });
    Route::name('batas-tanah.')->group(function () {
        Route::get('batas-tanah-lahan', [BatasController::class, 'index'])->name('all');
    });


    Route::name('peraturan.')->group(function () {
        Route::get('peraturan', [PeraturanController::class, 'index'])->name('all');
        Route::post('peraturan', [PeraturanController::class, 'store'])->name('add');
        Route::get('peraturan/{id}', [PeraturanController::class, 'show'])->name('show');
        Route::post('peraturan/{id}', [PeraturanController::class, 'update'])->name('update');
        Route::delete('peraturan/{id}', [PeraturanController::class, 'destroy'])->name('remove');
    });
});
Route::get('kelurahan/{id_kecamatan}', [KelurahanController::class, 'show'])->name('kelurahan.show');
