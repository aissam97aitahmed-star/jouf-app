<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        // مشاركه البيانات مع كل view تستخدم الـ layout
        View::composer('officer_security.layout', function ($view) {
            $today = Carbon::today();
            $todayOrders = Order::whereDate('visit_date', $today)->get();

            $totalToday = $todayOrders->count();
            $pending = 0; // أو حسب حالة الطلب
            $approved = $todayOrders->count();
            $inProgress = $todayOrders->whereNotNull('entry_time')->whereNull('exit_time')->count();
            $completed = $todayOrders->whereNotNull('entry_time')->whereNotNull('exit_time')->count();
            $alerts = Notification::where('role', 'security_officer')->count(); // أو حسب التنبيهات الفعلية

            $view->with(compact('totalToday', 'pending', 'approved', 'inProgress', 'completed', 'alerts'));
        });
    }
}
