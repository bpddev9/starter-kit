<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::redirect("/", "admin/dashboard")->name('home');

Route::middleware("guest")->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login-post', [AdminAuthController::class, 'loginPost'])->name('login.post');
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout')->middleware('auth');