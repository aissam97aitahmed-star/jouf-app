<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Enums\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::cases();
        return view('admin.employees.index', compact('employees', 'departments'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:20',
            'office_location' => 'nullable|string|max:255',
        ]);

        Employee::create($request->all());
        ToastMagic::success('تم إضافة الموظف بنجاح');
        return redirect()->route('admin.employees.index');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::cases();
        return view('admin.employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|string|max:20',
            'office_location' => 'nullable|string|max:255',
        ]);

        $employee->update($request->all());
        ToastMagic::success('تم تحديث بيانات الموظف');
        return redirect()->route('admin.employees.index');
    }



    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف الموظف بنجاح'
        ]);
    }
}
