<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\LoginController;
use App\Http\Controllers\Manager\DashboardController;

Route::prefix('manager_security')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('manager.login');
    Route::middleware(['auth', 'role:security_manager'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('security_manager.dashboard');
        Route::get('notifications', [DashboardController::class, 'notifications'])->name('security_manager.notifications');
        Route::post('/notifications/read/{id}', [DashboardController::class, 'markAsRead'])->name('security_manager.notifications.read');
        Route::post('/notifications/read-all', [DashboardController::class, 'markAllAsRead'])->name('security_manager.notifications.read.all');
        Route::delete('/notifications/delete/{id}', [DashboardController::class, 'destroy'])->name('security_manager.notifications.delete');
    });
});
