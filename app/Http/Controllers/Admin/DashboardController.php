<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Video;
use App\Models\Policy;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'orders_count' => Order::count(),
            'employyes_count' => User::where('role', 'employee')->count(),
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


    public function updatePasswordForm()
    {
        return view('admin.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // التحقق من كلمة المرور الحالية
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        // تحديث كلمة المرور الجديدة
        $user->password = Hash::make($request->new_password);
        $user->save();

        ToastMagic::success('تم تغيير كلمة المرور بنجاح');
        return back();
    }
}
