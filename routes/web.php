<?php

use App\Http\Controllers\{
    ProfileController,
    PermintaanP3kController,
    RelawanController,
    BencanaController,
    DataKorbanController,
    KontakDaruratController,
    PenugasanRelawanController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk Permintaan P3K
    Route::resource('permintaan_p3k', PermintaanP3kController::class);

    // Route untuk Relawan
    Route::resource('relawan', RelawanController::class);

    // Route untuk Bencana
    Route::resource('bencana', BencanaController::class);

    // Route untuk Data Korban
    Route::resource('data_korban', DataKorbanController::class);

    // Route untuk Kontak Darurat
    Route::resource('kontak_darurat', KontakDaruratController::class);

    // Route untuk Penugasan Relawan
    Route::resource('penugasan_relawan', PenugasanRelawanController::class);

});

require __DIR__.'/auth.php';