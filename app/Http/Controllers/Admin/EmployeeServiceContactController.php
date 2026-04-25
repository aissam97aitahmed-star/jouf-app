<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeServiceContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class EmployeeServiceContactController extends Controller
{
    private const SERVICE_OPTIONS = [
        'hr_operations' => 'عمليات الموارد البشرية',
        'talent_acquisition' => 'التوظيف والتطوير والتدريب',
        'corporate_services' => 'الخدمات الإدارية',
        'it_services' => 'الخدمات التقنية',
    ];

    public function index()
    {
        $contacts = EmployeeServiceContact::orderBy('service_key')
            ->orderBy('sort_order')
            ->latest('id')
            ->get();

        $serviceOptions = self::SERVICE_OPTIONS;

        return view('admin.service-contacts.index', compact('contacts', 'serviceOptions'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        EmployeeServiceContact::create($data);

        ToastMagic::success('تمت إضافة جهة التواصل');
        return back();
    }

    public function update(Request $request, EmployeeServiceContact $service_contact)
    {
        $data = $this->validatedData($request);
        $service_contact->update($data);

        ToastMagic::success('تم تحديث جهة التواصل');
        return back();
    }

    public function destroy(EmployeeServiceContact $service_contact)
    {
        $service_contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف جهة التواصل بنجاح',
        ]);
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'service_key' => 'required|in:' . implode(',', array_keys(self::SERVICE_OPTIONS)),
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]) + [
            'is_active' => $request->boolean('is_active'),
            'sort_order' => (int) ($request->input('sort_order', 0)),
        ];
    }
}
