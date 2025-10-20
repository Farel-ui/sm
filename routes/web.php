<?php

use App\Http\Controllers\AdminPenilaianController;
use App\Http\Controllers\AdminBookletController;
use App\Http\Controllers\AdminDimensionController;
use App\Http\Controllers\AdminIgaController;
use App\Http\Controllers\AdminImplementasiController;
use App\Http\Controllers\AdminMasterplanController;
use App\Http\Controllers\AdminQuickwinController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterplanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;

// ✅ Tampilan awal website (public)
Route::get('/', [MasterplanController::class, 'index'])->name('home');
Route::get('/penilaian', [MasterplanController::class, 'penilaian'])->name('penilaian');
Route::get('/iga', [MasterplanController::class, 'iga'])->name('iga');
Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');
Route::get('/masterplan/buku', [MasterplanController::class, 'buku'])->name('masterplan.buku');
Route::get('/masterplan/paparan', [MasterplanController::class, 'paparan'])->name('masterplan.paparan');
Route::get('/implementasi', [MasterplanController::class, 'implementasi'])->name('implementasi');
Route::get('/paparan', [MasterplanController::class, 'paparan'])->name('paparan');
Route::get('/Dokumen', [MasterplanController::class, 'Dokumen'])->name('Dokumen');
Route::get('/masterplano', [MasterplanController::class, 'masterplano'])->name('masterplano');

// ✅ Middleware auth: hanya admin/login yang bisa akses dashboard
Route::middleware(['auth'])->group(function () {

    // 🏠 Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');

    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'destroyAvatar'])->name('profile.avatar.destroy');

    Route::get('/dokumen', fn () => view('dokumen'))->name('dokumen');

    // 📌 Prefix Admin Disatukan
    Route::prefix('admin')->name('admin.')->middleware(['role:admin,super_admin'])->group(function () {

        // 📚 Masterplan
        Route::prefix('masterplan')->name('masterplan.')->group(function () {
            Route::get('/', [AdminMasterplanController::class, 'index'])->name('index');
            Route::get('/create', [AdminMasterplanController::class, 'create'])->name('create');
            Route::post('/store', [AdminMasterplanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminMasterplanController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminMasterplanController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminMasterplanController::class, 'destroy'])->name('destroy');
        });

        // 💡 IGA
        Route::prefix('iga')->name('iga.')->group(function () {
            Route::get('/', [AdminIgaController::class, 'index'])->name('index');
            Route::get('/create', [AdminIgaController::class, 'create'])->name('create');
            Route::post('/store', [AdminIgaController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminIgaController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminIgaController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminIgaController::class, 'destroy'])->name('destroy');
        });

        // 📑 Booklet
        Route::prefix('booklet')->name('booklet.')->group(function () {
            Route::get('/', [AdminBookletController::class, 'index'])->name('index');
            Route::get('/create', [AdminBookletController::class, 'create'])->name('create');
            Route::post('/store', [AdminBookletController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminBookletController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminBookletController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminBookletController::class, 'destroy'])->name('destroy');
        });

        // ⚡ Quickwin
        Route::prefix('quickwin')->name('quickwin.')->group(function () {
            Route::get('/', [AdminQuickwinController::class, 'index'])->name('index');
            Route::get('/create', [AdminQuickwinController::class, 'create'])->name('create');
            Route::post('/store', [AdminQuickwinController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminQuickwinController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminQuickwinController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminQuickwinController::class, 'destroy'])->name('destroy');
        });

        // 🌐 Dimension
        Route::prefix('dimension')->name('dimension.')->group(function () {
            Route::get('/', [AdminDimensionController::class, 'index'])->name('index');
            Route::get('/create', [AdminDimensionController::class, 'create'])->name('create');
            Route::post('/store', [AdminDimensionController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminDimensionController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminDimensionController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminDimensionController::class, 'destroy'])->name('destroy');
        });

        // 🏗️ Implementasi
        Route::prefix('implementasi')->name('implementasi.')->group(function () {
            Route::get('/', [AdminImplementasiController::class, 'index'])->name('index');
            Route::get('/create', [AdminImplementasiController::class, 'create'])->name('create');
            Route::post('/store', [AdminImplementasiController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminImplementasiController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminImplementasiController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminImplementasiController::class, 'destroy'])->name('destroy');
        });

        // Routes accessible only by super_admin
        Route::middleware(['role:super_admin'])->group(function () {
            // 📊 Penilaian - Only Super Admin
            Route::prefix('penilaian')->name('penilaian.')->group(function () {
                Route::get('/', [AdminPenilaianController::class, 'index'])->name('index');
                Route::get('/create', [AdminPenilaianController::class, 'create'])->name('create');
                Route::post('/store', [AdminPenilaianController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [AdminPenilaianController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [AdminPenilaianController::class, 'update'])->name('update');
                Route::delete('/{id}', [AdminPenilaianController::class, 'destroy'])->name('destroy');
            });

            // 👥 Users Management - Only Super Admin
            Route::prefix('users')->name('users.')->group(function () {
                Route::get('/', [AdminUsersController::class, 'index'])->name('index');
                Route::get('/create', [AdminUsersController::class, 'create'])->name('create');
                Route::post('/store', [AdminUsersController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [AdminUsersController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [AdminUsersController::class, 'update'])->name('update');
                Route::delete('/{id}', [AdminUsersController::class, 'destroy'])->name('destroy');
            });
        });
    });

    // 👤 Breeze profile route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Breeze Auth (login/register/logout)
require __DIR__.'/auth.php';
