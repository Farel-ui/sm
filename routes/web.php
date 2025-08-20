<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterplanController;
use App\Http\Controllers\AdminMasterplanController;
use App\Http\Controllers\AdminIgaController;

// ✅ Tampilan awal website
Route::get('/', [MasterplanController::class, 'index'])->name('home');
Route::get('/penilaian', [MasterplanController::class, 'penilaian'])->name('penilaian');
Route::get('/implementasi', [MasterplanController::class, 'implementasi']);
Route::get('/implementasi',[MasterplanController::class, 'implementasi'])->name('implementasi');
Route::get('/iga', [MasterplanController::class, 'iga'])->name('iga');
Route::get('/penilaian/data-chart', [MasterplanController::class, 'chartData']);
Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');
Route::get('/Dokumen', [MasterplanController::class, 'Dokumen'])->name('Dokumen');
Route::get('/masterplano', function () {
    return view('masterplano');
})->name('masterplano');

Route::get('/paparan', function () {
    return view('paparan');
})->name('paparan');

    
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
        Route::get('/admin/iga/', [AdminIgaController::class, 'index'])->name('iga');
    Route::get('/admin/iga/create', [AdminIgaController::class, 'create'])->name('iga.create');
    Route::post('/admin/iga/store', [AdminIgaController::class, 'store'])->name('iga.store');
    Route::get('/admin/iga/{id}/edit', [AdminIgaController::class, 'edit'])->name('iga.edit');
    Route::post('/admin/iga/update/{id}', [AdminIgaController::class, 'update'])->name('iga.update');
    Route::post('/admin/iga/{id}', [AdminIgaController::class, 'destroy'])->name('iga.destroy');
    // Tambahkan di sini sesuai kebutuhan (opsional)

    // ✅ Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

// ✅ Breeze auth route
require __DIR__.'/auth.php';
