<?php

namespace App\Http\Controllers\Officer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QrController extends Controller
{
    public function scan(Request $request)
    {
        $qrCode = $request->qr_code;

        // احفظ الكود أو تحقق منه حسب احتياجك
        // مثال: تخزين في قاعدة البيانات
        // QRScan::create(['code' => $qrCode, 'officer_id' => auth()->id()]);

        return response()->json([
            'status' => 'تم مسح الرمز بنجاح!',
            'code' => $qrCode
        ]);
    }
}
