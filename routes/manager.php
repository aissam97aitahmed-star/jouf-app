<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\LoginController;

Route::prefix('manager_security')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('manager.login');
    Route::middleware(['auth', 'role:security_manager'])->group(function () {
        Route::get('dashboard', function () {
            return view('manager_security.dashboard');
        })->name('security_manager.dashboard');
    });
});
