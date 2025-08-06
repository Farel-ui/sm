<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterplanController;
use App\Http\Controllers\AdminMasterplanController;

// ✅ Tampilan awal website
Route::get('/', [MasterplanController::class, 'index'])->name('home');
Route::get('/penilaian', [MasterplanController::class, 'penilaian'])->name('penilaian');
Route::get('/iga', [MasterplanController::class, 'iga'])->name('iga');
Route::get('/masterplan/buku', [MasterplanController::class, 'buku'])->name('masterplan.buku');
Route::get('/masterplan/paparan', [MasterplanController::class, 'paparan'])->name('masterplan.paparan');

// ✅ Middleware auth: semua route admin/dashboard hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    // ✅ Halaman dashboard admin
    Route::get('/dashboard', [MasterplanController::class, 'admin'])->name('dashboard');

    // ✅ CRUD Masterplan
    Route::get('/admin/masterplan/', [AdminMasterplanController::class, 'index'])->name('masterplan');
    Route::get('/admin/masterplan/create', [AdminMasterplanController::class, 'create'])->name('masterplan.create');
    Route::post('/admin/masterplan/store', [AdminMasterplanController::class, 'store'])->name('masterplan.store');
    Route::get('/admin/masterplan/{id}/edit', [AdminMasterplanController::class, 'edit'])->name('masterplan.edit');
    Route::post('/admin/masterplan/update/{id}', [AdminMasterplanController::class, 'update'])->name('masterplan.update');
    Route::post('/admin/masterplan/{id}', [AdminMasterplanController::class, 'destroy'])->name('masterplan.destroy');

    // ✅ CRUD tambahan lain jika kamu punya dimension, quickwin, booklet, iga, dll
    // Tambahkan di sini sesuai kebutuhan (opsional)

    // ✅ Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

// ✅ Breeze auth route
require __DIR__.'/auth.php';
