<?php

namespace App\Http\Controllers\Manager;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $query = Order::query();

        if ($request->status) {
            if ($request->status == 'pending') {
                $query->whereNull('entry_time');
            } elseif ($request->status == 'in_progress') {
                $query->whereNotNull('entry_time')->whereNull('exit_time');
            } elseif ($request->status == 'completed') {
                $query->whereNotNull('entry_time')->whereNotNull('exit_time');
            }
        }

        $orders = $query->get();

        // حساب الأعداد لكل حالة للـ buttons
        $totalCount = Order::count();
        $pendingCount = Order::whereNull('entry_time')->count();
        $inProgressCount = Order::whereNotNull('entry_time')->whereNull('exit_time')->count();
        $completedCount = Order::whereNotNull('entry_time')->whereNotNull('exit_time')->count();

        return view('manager_security.dashboard', compact('orders', 'totalCount', 'pendingCount', 'inProgressCount', 'completedCount'));
        // return view('manager_security.dashboard', compact('orders'));
    }
}
