<?php

namespace App\Http\Controllers\Manager;

use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $notificationCount = Notification::where([
            'role' => 'security_manager',
            'is_read' => false
        ])->count();

        $query = Order::query();

        if ($request->status) {
            if ($request->status === 'pending') {
                $query->whereNull('entry_time');
            } elseif ($request->status === 'in_progress') {
                $query->whereNotNull('entry_time')->whereNull('exit_time');
            } elseif ($request->status === 'completed') {
                $query->whereNotNull('entry_time')->whereNotNull('exit_time');
            }
        }

        // ✅ paginate 10 orders per page + keep filters
        $orders = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Counts for buttons (remain unchanged)
        $totalCount = Order::count();
        $pendingCount = Order::whereNull('entry_time')->count();
        $inProgressCount = Order::whereNotNull('entry_time')->whereNull('exit_time')->count();
        $completedCount = Order::whereNotNull('entry_time')->whereNotNull('exit_time')->count();

        return view(
            'manager_security.dashboard',
            compact(
                'orders',
                'totalCount',
                'pendingCount',
                'inProgressCount',
                'completedCount',
                'notificationCount'
            )
        );
    }


    public function notifications()
    {
        $notifications = Notification::where('role', 'security_manager')->orderBy('id', 'DESC')->get();
        $notificationCount = Notification::where(['role' => 'security_manager', 'is_read' => false])->count() ?? 0;

        return view('manager_security.notifications', compact('notifications', 'notificationCount'));
    }

    // تحديد إشعار كمقروء
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    // تحديد كل الإشعارات كمقروء
    public function markAllAsRead()
    {
        Notification::where('is_read', false)->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    // حذف إشعار
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(['success' => true]);
    }
}
