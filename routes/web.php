<?php

use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ComparisonController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/comparison', [ComparisonController::class, 'create'])->name('comparison.create');
    Route::post('/comparison', [ComparisonController::class, 'store'])->name('comparison.store');
    Route::delete('/comparison/{id}', [ComparisonController::class, 'destroy'])->name('comparison.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
