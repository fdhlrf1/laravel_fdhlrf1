<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'cekLogin'])->name('login.auth');
});

Route::resource('rumah-sakit', RumahSakitController::class)->except('index');
Route::get('rumah-sakit', [RumahSakitController::class, 'index']);
Route::resource('pasien', PasienController::class)->except('index');
Route::get('pasien', [PasienController::class, 'index']);

Route::get('pasien/filter/{id_rumah_sakit}', [PasienController::class, 'filterPasien']);
Route::get('not-filter', [PasienController::class, 'notFilterPasien']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');