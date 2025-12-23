<?php

namespace App\Http\Controllers\Officer;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QrController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string'
        ]);

        $order = Order::where('order_number', $request->qr_code)->first();

        if (! $order) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود'
            ], 404);
        }

        // ✅ أول مسح فقط → تسجيل وقت الدخول
        if (is_null($order->entry_time)) {
            $order->update([
                'entry_time' => now()->format('H:i:s'),
                'status' => 'in_progress',
            ]);

            // 🔥 إعادة تحميل القيم من DB
            $order->refresh();
        }
        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    public function exit(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string'
        ]);

        $order = Order::where('order_number', $request->order_number)->first();

        if (! $order) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود'
            ], 404);
        }

        if (is_null($order->entry_time)) {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم تسجيل الدخول بعد'
            ], 422);
        }
  
        if (! is_null($order->exit_time)) {
            return response()->json([
                'success' => false,
                'message' => 'تم تسجيل الخروج مسبقاً'
            ], 422);
        }

        $order->update([
            'exit_time' => Carbon::now(),
            'status' => 'completed',

        ]);

        return response()->json([
            'success' => true,
            'exit_time' => $order->exit_time
        ]);
    }
}
