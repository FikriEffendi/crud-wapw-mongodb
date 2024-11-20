<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::patch('/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
});
