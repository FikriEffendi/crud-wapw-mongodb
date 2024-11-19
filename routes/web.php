<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
Route::post('dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
