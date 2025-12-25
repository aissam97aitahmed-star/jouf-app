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
        Route::get('/visitors/entry/{order}', [PagesController::class, 'visitorEntry'])->name('visitor.entry');
        Route::get('/visitors/exit/{order}', [PagesController::class, 'visitorExit'])->name('visitor.exit');
        Route::get('/visitors/order/{order}', [PagesController::class, 'getOrder'])->name('order.get');

        Route::get('/notification', [PagesController::class, 'notification'])->name('notification');
        Route::post('/notifications/read/{id}', [PagesController::class, 'markAsRead'])->name('notifications.read');
        Route::post('/notifications/read-all', [PagesController::class, 'markAllAsRead'])->name('notifications.read.all');
        Route::delete('/notifications/delete/{id}', [PagesController::class, 'destroy'])->name('notifications.delete');

        Route::get('/reports', [PagesController::class, 'reports'])->name('reports');
        Route::post('/scan-qr', [QrController::class, 'scan'])->name('qr.scan');
        Route::post('/qr/exit',  [QrController::class, 'exit'])->name('qr.exit');
    });
});
