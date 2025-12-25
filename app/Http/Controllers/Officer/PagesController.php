<?php

namespace App\Http\Controllers\Officer;

use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PagesController extends Controller
{
    public function index()
    {
        $activeOrders = Order::whereNotNull('entry_time')
            ->whereNull('exit_time')
            ->get();
        $notifications = Notification::where('role', 'security_officer')
            ->orderBy('id', 'DESC')
            ->take(2)   // أو ->limit(2)
            ->get();
        return view('officer_security.dashboard', compact('activeOrders', 'notifications'));
    }
    public function scanner()
    {
        return view('officer_security.scanner');
    }
    public function visitors()
    {
        $todayOrders = Order::whereDate('visit_date', Carbon::today())->get();
        return view('officer_security.visitors', compact('todayOrders'));
    }

    public function visitorEntry(Order $order)
    {
        if (is_null($order->entry_time)) {
            $order->update([
                'entry_time' => now()->format('H:i:s'),
                'status' => 'in_progress',

            ]);
            ToastMagic::success('تم تسجيل دخول الزائر بنجاح');
            return back();
        }
        ToastMagic::success('تم تسجيل دخول الزائر مسبقا');
        return back();
    }

    public function visitorExit(Order $order)
    {

        if (is_null($order->entry_time)) {
            // لم يتم تسجيل الدخول بعد
            ToastMagic::warning('لا يمكن تسجيل خروج الزائر قبل تسجيل الدخول');
            return back();
        }

        if (is_null($order->exit_time)) {
            $order->update([
                'exit_time' => now()->format('H:i:s'),
                'status' => 'completed',
            ]);
            ToastMagic::success('تم تسجيل خروج الزائر بنجاح');
            return back();
        }
        ToastMagic::success('تم تسجيل خروج الزائر مسبقا');
        return back();
    }

    public function getOrder(Order $order)
    {
        return response()->json([
            'success' => true,
            'order' => [
                'full_name' => $order->full_name,
                'phone' => $order->phone,
                'identity_number' => $order->identity_number,
                'company' => $order->company,
                'visit_purpose' => $order->visit_purpose,
                'host_employee' => $order->host_employee,
                'department' => $order->department,
                'visit_duration' => $order->visit_duration,
                'special_requests' => $order->special_requests,
                'entry_time' => $order->entry_time,
                'exit_time' => $order->exit_time,
            ]
        ]);
    }

    public function notification()
    {
        $notifications = Notification::where('role', 'security_officer')->orderBy('id', 'DESC')->get();
        return view('officer_security.notification', compact('notifications'));
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

    public function reports()
    {
        $daysArabic = [
            'Saturday' => 'السبت',
            'Sunday' => 'الأحد',
            'Monday' => 'الاثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعة',
        ];

        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();

        // التقرير اليومي
        $todayOrders = Order::whereDate('created_at', $today)->get();
        $todayTotal = $todayOrders->count();
        $todayEntry = $todayOrders->whereNotNull('entry_time')->count();
        $todayExit = $todayOrders->whereNotNull('exit_time')->count();

        // التقرير الأسبوعي
        $weekOrders = Order::whereBetween('created_at', [$weekStart, $weekEnd])->get();

        // تجميع عدد الطلبات لكل يوم
        $groupedByDay = $weekOrders->groupBy(function ($order) {
            return $order->created_at->format('l'); // اسم اليوم بالإنجليزي
        })->map->count();

        $weekLabels = [];
        $weekData = [];
        foreach ($daysArabic as $en => $ar) {
            $weekLabels[] = $ar; // أسماء الأيام بالعربية
            $weekData[] = $groupedByDay[$en] ?? 0; // عدد الزوار لكل يوم
        }

        // حساب المتوسط اليومي، أعلى يوم، وأقل يوم
        $weekAvg = round(array_sum($weekData) / 7);
        $weekMax = max($weekData);
        $weekMaxIndex = array_search($weekMax, $weekData);
        $weekMaxDay = $weekLabels[$weekMaxIndex];

        $weekMin = min($weekData);
        $weekMinIndex = array_search($weekMin, $weekData);
        $weekMinDay = $weekLabels[$weekMinIndex];

        return view('officer_security.reports', compact(
            'todayTotal',
            'todayEntry',
            'todayExit',
            'weekAvg',
            'weekMax',
            'weekMaxDay',
            'weekMin',
            'weekMinDay',
            'weekLabels',
            'weekData'
        ));
    }
}
