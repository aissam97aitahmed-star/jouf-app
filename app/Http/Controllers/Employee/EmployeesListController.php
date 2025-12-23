<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\MessageTemplate;
use App\Mail\EmployeeMessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class EmployeesListController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $templates = MessageTemplate::all();
        return view('employees.list_employees', compact('employees', 'templates'));
    }


    public function sendMessage(Request $request)
    {
        // return $request->all();
        $employeeName = Employee::where('id', $request->employee_id)->first()->value('name') ?? '_';
        $request->validate([
            'employee_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:500',
            'priority' => 'nullable|in:low,medium,high',
        ]);
        Mail::to($request->employee_email)->send(
            new EmployeeMessageMail(
                $request->subject,
                $request->message,
                $request->priority,
                $employeeName
            )
        );
        ToastMagic::success('تم إرسال الرسالة بنجاح');
        return back();
    }
}
