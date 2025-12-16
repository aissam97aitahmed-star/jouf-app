<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\LoginController;

Route::prefix('manager_security')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('manager.login');
    Route::post('/login', [LoginController::class, 'login'])->name('manager.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('manager.logout');

    Route::get('/dashboard', function () {
        return view('manager_security.dashboard');
    })->middleware('manager')->name('manager.dashboard');
});
