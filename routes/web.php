<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RombelController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('/siswa')->name('siswa.')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('index');
    Route::get('/create', [SiswaController::class, 'create'])->name('create');
    Route::post('/store', [SiswaController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [SiswaController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [SiswaController::class, 'destroy'])->name('delete');
});

Route::prefix('/rombel')->name('rombel.')->group(function () {
    Route::get('/data-rombel', [RombelController::class, 'index'])->name('data-rombel');
    Route::get('/detail-rombel/{id}', [RombelController::class, 'show'])->name('show');
    Route::get('/create-rombel', [RombelController::class, 'create'])->name('create');
    Route::post('/store-rombel', [RombelController::class, 'store'])->name('store');
    Route::get('/edit-rombel/{id}', [RombelController::class, 'edit'])->name('edit');
    Route::patch('/update-rombel/{id}', [RombelController::class, 'update'])->name('update');
    Route::delete('/delete-rombel/{id}', [RombelController::class, 'destroy'])->name('delete');
    Route::post('/rombel/{id}/add-siswa', [rombelController::class, 'addSiswa'])->name('add-siswa');
});
