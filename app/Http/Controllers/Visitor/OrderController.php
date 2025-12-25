<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Order;
use App\Enums\Department;
use App\Enums\VisitPurpose;
use App\Enums\VisitDuration;
use Illuminate\Http\Request;
use App\Mail\OrderCreatedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Services\NotificationService;
use App\Events\NewVisitorOrderCreated;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Monarobase\CountryList\CountryListFacade as Countries;

class OrderController extends Controller
{

    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }


    public function index()
    {
        // ToastMagic::success('تم إرسال الطلب بنجاح!');
        $nationalities = Countries::getList('ar');
        $visitPurposes = VisitPurpose::cases();
        $departments   = Department::cases();
        $visitDurations   = VisitDuration::cases();
        return view('visitors.order_form', compact('nationalities', 'visitPurposes', 'departments', 'visitDurations'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            // Step 1
            'full_name'        => 'required|string|max:255',
            'identity_number'  => 'required|string|max:255',
            'nationality'      => 'nullable|string|max:255',
            'phone'            => 'required|string|max:50',
            'email'            => 'required|email|max:255',
            'company'          => 'nullable|string|max:255',
            'job_title'        => 'nullable|string|max:255',

            // Step 2
            'visit_purpose'    => 'required|string|max:255',
            'visit_date'       => 'required|date',
            'visit_time'       => 'required|string|max:100',
            'visit_duration'   => 'nullable|string|max:100',
            'host_employee'    => 'required|string|max:255',
            'department'       => 'nullable|string|max:255',

            // Step 3
            'car_plate'        => 'nullable|string|max:100',
            'companions'       => 'nullable|string|max:255',
            'special_requests' => 'nullable|string',

            // Checkboxes
            'has_valid_id'       => 'required|boolean',
            'has_company_letter' => 'required|boolean',
        ]);

        // إذا لم يتم إرسال الـ checkbox، اجعل القيمة false
        $validated['has_valid_id']       = $request->boolean('has_valid_id');
        $validated['has_company_letter'] = $request->boolean('has_company_letter');


        // توليد رقم طلب فريد
        do {
            $orderNumber = 'JF-' . mt_rand(100000, 999999);
        } while (Order::where('order_number', $orderNumber)->exists());

        $validated['order_number'] = $orderNumber;

        // حفظ الطلب مع تخزين الكائن
        $order = Order::create($validated);
        broadcast(new NewVisitorOrderCreated($order));
        $this->notificationService->store(
            'طلب جديد',
            'تم إنشاء طلب زيارة من ' . $request->full_name,
            'security_manager'
        );
        $this->notificationService->store(
            'طلب جديد',
            'تم إنشاء طلب زيارة من ' . $request->full_name,
            'security_officer'
        );
        // إرسال البريد الإلكتروني
        Mail::to($order->email)->send(new OrderCreatedMail($order));
        ToastMagic::success('تم إرسال الطلب بنجاح!');
        // إعادة عرض الـ view مع إرسال order_id
        return redirect()->route('visitor.order.success')
            ->with('success', 'تم إرسال الطلب بنجاح!')
            ->with('order_id', $order->id)
            ->with('order_number', $order->order_number);
    }

    public function success()
    {
        if (!session()->has('order_number')) {
            return redirect()->route('visitor.apply'); // أو '/' حسب route الصفحة الرئيسية
        }
        return view('visitors.order_submit');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'تم تحديث حالة الطلب');
    }
}
