<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Video;
use App\Models\Policy;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index () {
         return view('admin.index', [
            'orders_count' => Order::count(),
            'employyes_count' => User::where('role','employee')->count(),
            'videos_count' => Video::count(),
            'policies_count' => Policy::count(),
            'orders' => Order::all(),
         ]);
    }

      public function deleteOrder(Order $order)
    {
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف بنجاح'
        ]);
    }
}
