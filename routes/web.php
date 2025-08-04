<?php

use App\Http\Controllers\ProfileController;
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
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Tambahkan CRUD di sini
    Route::resource('masterplans', App\Http\Controllers\Admin\MasterplanController::class);
    Route::resource('quickwins', App\Http\Controllers\Admin\QuickWinController::class);
    Route::resource('dimensions', App\Http\Controllers\Admin\DimensionController::class);
    Route::resource('booklets', App\Http\Controllers\Admin\BookletController::class);
    Route::resource('igas', App\Http\Controllers\Admin\IgaController::class);
    Route::resource('assessments', App\Http\Controllers\Admin\AssessmentController::class);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
