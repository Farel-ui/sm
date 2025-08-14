<?php

use App\Http\Controllers\AdminIgaController;
use App\Http\Controllers\AdminMasterplanController;
use App\Http\Controllers\MasterplanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SmartCityChartController;
use Illuminate\Support\Facades\Route;

// ✅ Tampilan awal website
Route::get('/', [MasterplanController::class, 'index'])->name('home');
Route::get('/penilaian', [MasterplanController::class, 'penilaian'])->name('penilaian');
Route::get('/implementasi', [MasterplanController::class, 'implementasi']);
Route::get('/implementasi',[MasterplanController::class, 'implementasi'])->name('implementasi');
Route::get('/iga', [MasterplanController::class, 'iga'])->name('iga');
Route::get('/penilaian/data-chart', [MasterplanController::class, 'chartData']);
Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');
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
    Route::get('/masterplan', [MasterplanController::class, 'masterplan'])->name('masterplan.frontend');


    // ✅ CRUD IGA
    Route::get('/admin/iga/', [AdminIgaController::class, 'index'])->name('iga');
    Route::get('/admin/iga/create', [AdminIgaController::class, 'create'])->name('iga.create');
    Route::post('/admin/iga/store', [AdminIgaController::class, 'store'])->name('iga.store');
    Route::get('/admin/iga/{id}/edit', [AdminIgaController::class, 'edit'])->name('iga.edit');
    Route::post('/admin/iga/update/{id}', [AdminIgaController::class, 'update'])->name('iga.update');
    Route::post('/admin/iga/{id}', [AdminIgaController::class, 'destroy'])->name('iga.destroy');

    // ✅ Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ CRUD SmartCityChart (Chart)
    Route::get('/chart', [SmartCityChartController::class, 'index'])->name('chart.index');
    Route::get('/chart/create', [SmartCityChartController::class, 'create'])->name('chart.create');
    Route::post('/chart/store', [SmartCityChartController::class, 'store'])->name('chart.store');
    Route::get('/chart/edit/{id}', [SmartCityChartController::class, 'edit'])->name('chart.edit');
    Route::post('/chart/update/{id}', [SmartCityChartController::class, 'update'])->name('chart.update');
    Route::post('/chart/delete/{id}', [SmartCityChartController::class, 'destroy'])->name('chart.destroy');
});



// ✅ Breeze auth route
require __DIR__.'/auth.php';

Route::get('/implementasi', function () {
    return view('implemen');
});


