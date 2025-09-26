<?php

use App\Http\Controllers\AdminAssessmentController;
use App\Http\Controllers\AdminBookletController;
use App\Http\Controllers\AdminDimensionController;
use App\Http\Controllers\AdminIgaController;
use App\Http\Controllers\AdminImplementasiController;
use App\Http\Controllers\AdminMasterplanController;
use App\Http\Controllers\AdminQuickwinController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterplanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;



// ✅ Tampilan awal website
Route::get('/', [MasterplanController::class, 'index'])->name('home');
Route::get('/assessment', [MasterplanController::class, 'assessment'])->name('assessment');
Route::get('/iga', [MasterplanController::class, 'iga'])->name('iga');
Route::get('/penilaian/data-chart', [MasterplanController::class, 'chartData']);
Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');
Route::get('/masterplan/buku', [MasterplanController::class, 'buku'])->name('masterplan.buku');
Route::get('/masterplan/paparan', [MasterplanController::class, 'paparan'])->name('masterplan.paparan');
Route::get('/implementasi', [MasterplanController::class, 'implementasi'])->name('implementasi');
Route::get('/paparan', [MasterplanController::class, 'paparan'])->name('paparan');
Route::get('/penilaian', [MasterplanController::class, 'penilaian']);
Route::get('/Dokumen', [MasterplanController::class, 'Dokumen'])->name('Dokumen');
Route::get('/masterplano', [MasterplanController::class, 'masterplano'])->name('masterplano');

   // ✅ Halaman dashboard admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');
});
// ✅ Middleware auth: semua route admin/dashboard hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    Route::get('/dokumen', function () {
    return view('dokumen');
})->name('dokumen');



    // ✅ CRUD Masterplan
    Route::get('/admin/masterplan', [AdminMasterplanController::class, 'index'])->name('admin.masterplan');
    Route::get('/admin/masterplan/create', [AdminMasterplanController::class, 'create'])->name('masterplan.create');
    Route::post('/admin/masterplan/store', [AdminMasterplanController::class, 'store'])->name('masterplan.store');
    Route::get('/admin/masterplan/{id}/edit', [AdminMasterplanController::class, 'edit'])->name('masterplan.edit');
    Route::put('/admin/masterplan/{id}', [AdminMasterplanController::class, 'update'])->name('masterplan.update');
    Route::delete('/admin/masterplan/{id}', [AdminMasterplanController::class, 'destroy'])->name('masterplan.destroy');

    // ✅ CRUD Iga
    Route::get('/admin/iga/', [AdminIgaController::class, 'index'])->name('iga');
    Route::get('/admin/iga/create', [AdminIgaController::class, 'create'])->name('iga.create');
    Route::post('/admin/iga/store', [AdminIgaController::class, 'store'])->name('iga.store');
    Route::get('/admin/iga/{id}/edit', [AdminIgaController::class, 'edit'])->name('iga.edit');
    Route::post('/admin/iga/update/{id}', [AdminIgaController::class, 'update'])->name('iga.update');
    Route::post('/admin/iga/{id}', [AdminIgaController::class, 'destroy'])->name('iga.destroy');

    // ✅ CRUD Assessment
    Route::get('/admin/assessment/', [AdminAssessmentController::class, 'index'])->name('assessment');
    Route::get('/admin/assessment/create', [AdminAssessmentController::class, 'create'])->name('assessment.create');
    Route::post('/admin/assessment/store', [AdminAssessmentController::class, 'store'])->name('assessment.store');
    Route::get('/admin/assessment/{id}/edit', [AdminAssessmentController::class, 'edit'])->name('assessment.edit');
    Route::put('/admin/assessment/update/{id}', [AdminAssessmentController::class, 'update'])->name('assessment.update'); // Change to PUT
    Route::delete('/admin/assessment/{id}', [AdminAssessmentController::class, 'destroy'])->name('assessment.destroy'); // Change to DELETE


    // ✅ CRUD Booklet
    Route::get('/admin/booklet/', [AdminBookletController::class, 'index'])->name('booklet');
    Route::get('/admin/booklet/create', [AdminBookletController::class, 'create'])->name('booklet.create');
    Route::post('/admin/booklet/store', [AdminBookletController::class, 'store'])->name('booklet.store');
    Route::get('/admin/booklet/{id}/edit', [AdminBookletController::class, 'edit'])->name('booklet.edit');
    Route::post('/admin/booklet/update/{id}', [AdminBookletController::class, 'update'])->name('booklet.update');
    Route::post('/admin/booklet/{id}', [AdminBookletController::class, 'destroy'])->name('booklet.destroy');

    // ✅ CRUD Quickwin
    Route::get('/admin/quickwin/', [AdminQuickwinController::class, 'index'])->name('quickwin');
    Route::get('/admin/quickwin/create', [AdminQuickwinController::class, 'create'])->name('quickwin.create');
    Route::post('/admin/quickwin/store', [AdminQuickwinController::class, 'store'])->name('quickwin.store');
    Route::get('/admin/quickwin/{id}/edit', [AdminQuickwinController::class, 'edit'])->name('quickwin.edit');
    Route::post('/admin/quickwin/update/{id}', [AdminQuickwinController::class, 'update'])->name('quickwin.update');
    Route::post('/admin/quickwin/{id}', [AdminQuickwinController::class, 'destroy'])->name('quickwin.destroy');

    // ✅ CRUD Dimension
    Route::get('/admin/dimension/', [AdminDimensionController::class, 'index'])->name('dimension');
    Route::get('/admin/dimension/create', [AdminDimensionController::class, 'create'])->name('dimension.create');
    Route::post('/admin/dimension/store', [AdminDimensionController::class, 'store'])->name('dimension.store');
    Route::get('/admin/dimension/{id}/edit', [AdminDimensionController::class, 'edit'])->name('dimension.edit');
    Route::post('/admin/dimension/update/{id}', [AdminDimensionController::class, 'update'])->name('dimension.update');
    Route::post('/admin/dimension/{id}', [AdminDimensionController::class, 'destroy'])->name('dimension.destroy');

    // ✅ CRUD Implementasi (Admin)
    Route::get('/admin/implementasi', [AdminImplementasiController::class, 'index'])->name('admin.implementasi');
    Route::get('/implementasi/create', [AdminImplementasiController::class, 'create'])->name('implementasi.create');
    Route::post('/implementasi/store', [AdminImplementasiController::class, 'store'])->name('implementasi.store');
    Route::get('/implementasi/{id}/edit', [AdminImplementasiController::class, 'edit'])->name('implementasi.edit');
    Route::put('/implementasi/{id}', [AdminImplementasiController::class, 'update'])->name('implementasi.update');
    Route::delete('/implementasi/{id}', [AdminImplementasiController::class, 'destroy'])->name('implementasi.destroy');


    // ✅ Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ✅ Breeze auth route
require __DIR__.'/auth.php';



