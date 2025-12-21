<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Officer\QrController;
use App\Http\Controllers\Officer\LoginController;
use App\Http\Controllers\Officer\PagesController;

Route::prefix('officer_security')->name('officer_security.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::middleware(['auth', 'role:security_officer'])->group(function () {
        Route::get('/dashboard', [PagesController::class, 'index'])->name('dashboard');
        Route::get('/scanner', [PagesController::class, 'scanner'])->name('scanner');
        Route::get('/visitors', [PagesController::class, 'visitors'])->name('visitors');
        Route::get('/notification', [PagesController::class, 'notification'])->name('notification');
        Route::get('/reports', [PagesController::class, 'reports'])->name('reports');
        Route::post('/scan-qr', [QrController::class, 'scan'])->name('qr.scan');

    });
});
