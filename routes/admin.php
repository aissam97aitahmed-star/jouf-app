<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BotFaqController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AdminMapController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeVideoController;
use App\Http\Controllers\Admin\BotSettingController;
use App\Http\Controllers\Admin\BotConversationController;



Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');


    //**######################## START MAP ROUTES **########################\\
    Route::prefix('map')->name('map.')->group(function () {
        Route::get('/', [AdminMapController::class, 'index'])->name('index');
        Route::post('/store', [AdminMapController::class, 'store'])->name('store');
        Route::get('/show/{location}', [AdminMapController::class, 'show'])->name('show');
        Route::get('/edit/{location}', [AdminMapController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{location}', [AdminMapController::class, 'destroy'])->name('destroy');
        Route::put('/map/update/{location}', [AdminMapController::class, 'update'])->name('update');
    });
    //**######################## END MAP ROUTES **########################\\

    //**######################## START ViIDEOS ROUTES **########################\\
    Route::resource('videos', VideoController::class);
    //**######################## END ViIDEOS ROUTES **########################\\

    //**######################## START EMPLOYYES ROUTES **########################\\
    Route::resource('employees', EmployeeController::class);
    //**######################## END EMPLOYYES ROUTES **########################\\

    //**######################## START EMPLOYYES ROUTES **########################\\
    Route::resource('policies', PolicyController::class);
    //**######################## END EMPLOYYES ROUTES **########################\\

    //**######################## START BOT ROUTES **########################\\
    Route::get('/bot/settings', [BotSettingController::class, 'index'])->name('bot.index');
    Route::put('/bot/settings', [BotSettingController::class, 'update'])->name('bot-settings.update');
    Route::resource('/bot/faqs', BotFaqController::class);
    Route::get('/bot/conversations', [BotConversationController::class, 'index']);
    //**######################## END BOT ROUTES **########################\\

    //**######################## START EMPLOYYES ROUTES **########################\\
    Route::get('/home-video', [HomeVideoController::class, 'edit'])->name('home-video.edit');
    Route::post('/home-video', [HomeVideoController::class, 'update'])->name('home-video.update');
    //**######################## END EMPLOYYES ROUTES **########################\\


});

Route::get('/control_panel', function () {
    //  dd(Auth::user()->name);
    return view('admin.index');
})->name('admin.index');
