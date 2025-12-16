<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Visitor\OrderController;

Route::prefix('visitor')->name('visitor.')->group(function () {
    Route::get('/request_permit', [OrderController::class, 'index'])->name('apply');
    Route::post('/request_permit', [OrderController::class, 'store'])->name('order.submit');
    Route::get('/success_permit', [OrderController::class, 'success'])->name('order.success');
});
