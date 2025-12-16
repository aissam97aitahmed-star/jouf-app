<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesContoller;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/welcome_program', [PagesContoller::class, 'welcomeProgram'])->name('welcome.program');
Route::get('/permit_program', [PagesContoller::class, 'permitProgram'])->name('permit.program');

Route::get('/employee', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/employee.php';
require __DIR__.'/visitor.php';
require __DIR__.'/manager.php';
