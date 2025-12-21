<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesListController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.list_employees', compact('employees'));
    }
}
