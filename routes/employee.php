<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\BotController;
use App\Http\Controllers\Employee\MapController;
use App\Http\Controllers\Employee\VideoController;
use App\Http\Controllers\Employee\PrivacyController;
use App\Http\Controllers\Employee\EmployeesListController;

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/map', [MapController::class, 'index'])->name('map');
    Route::get('/videos', [VideoController::class, 'index'])->name('videos');
    Route::get('/employees_list', [EmployeesListController::class, 'index'])->name('employeeslist');
    Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
    Route::get('/chat_bot', [BotController::class, 'index'])->name('bot');
});

