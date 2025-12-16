<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesListController extends Controller
{
    public function index()
    {
        return view('employees.list_employees');
    }
}
