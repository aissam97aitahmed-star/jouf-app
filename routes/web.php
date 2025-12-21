<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesContoller;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    //  dd(Auth::user()->name);
    return view('welcome');
})->name('index');

Route::get('/welcome_program', [PagesContoller::class, 'welcomeProgram'])->name('welcome.program');
Route::get('/permit_program', [PagesContoller::class, 'permitProgram'])->name('permit.program');

require __DIR__.'/auth.php';
require __DIR__.'/employee.php';
require __DIR__.'/visitor.php';
require __DIR__.'/manager.php';
require __DIR__.'/officer.php';
require __DIR__.'/admin.php';


// USERNAME :JADCO
// PASSWORD  : FaAm@$ri@ad2030
