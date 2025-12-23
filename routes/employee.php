<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\BotController;
use App\Http\Controllers\Employee\MapController;
use App\Http\Controllers\Employee\VideoController;
use App\Http\Controllers\Employee\PrivacyController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Employee\EmployeesListController;


Route::view('/mail', 'emails.employee-message');
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/map', [MapController::class, 'index'])->name('map');
    Route::get('/videos', [VideoController::class, 'index'])->name('videos');
    Route::post('/videos/{id}/increment-views', [VideoController::class, 'incrementViews'])->name('videos');
    Route::get('/employees_list', [EmployeesListController::class, 'index'])->name('employeeslist');
    Route::post('/employees_list/send-mail', [EmployeesListController::class, 'sendMessage'])->name('send.message');
    Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
    Route::get('/chat_bot', [BotController::class, 'index'])->name('bot');
    Route::post('/bot/ask', [BotController::class, 'ask'])->name('bot.ask');
    Route::get('/conversations/export', [BotController::class, 'export'])->name('bot.export');
});
