<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BotFaqController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AdminMapController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeVideoController;
use App\Http\Controllers\Admin\BotSettingController;
use App\Http\Controllers\Admin\BotConversationController;
use App\Http\Controllers\Admin\MessageTemplateController;

Route::get('/admin/login', function () {
    if (Auth::check() && Auth::user()->role == "admin") {
        return redirect()->route('admin.dashboard');
    }
    Auth::logout();
    return view('admin.login');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/dashboard/destry/order/{order}', [DashboardController::class, 'deleteOrder'])->name('delete.order');
    Route::get('/password/update', [DashboardController::class, 'updatePasswordForm'])->name('password.update');
    Route::post('/password/reset', [DashboardController::class, 'updatePassword'])->name('password.reset');


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
    Route::get('/employees/export', [EmployeeController::class, 'export'])->name('employees.export');
    Route::post('/employees/import', [EmployeeController::class, 'import'])->name('employees.import');
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

    //**######################## START EMPLOYYES ROUTES **########################\\
    Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
    Route::resource('users', UserController::class);
    //**######################## END EMPLOYYES ROUTES **########################\\

    //**######################## START EMPLOYYES ROUTES **########################\\
    Route::resource('templates', MessageTemplateController::class);
    //**######################## END EMPLOYYES ROUTES **########################\\


});

Route::get('/control_panel', function () {
    //  dd(Auth::user()->name);
    return view('admin.index');
})->name('admin.index');
