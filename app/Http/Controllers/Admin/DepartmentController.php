<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'responsible_employee' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        Department::create($request->all());
        ToastMagic::success('تم إضافة القسم');

        return back();
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'responsible_employee' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $department->update($request->all());
        ToastMagic::success('تم تعديل القسم');
        return back();
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف القسم بنجاح'
        ]);
    }
}
