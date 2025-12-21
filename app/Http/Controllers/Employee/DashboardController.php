<?php

namespace App\Http\Controllers\Employee;

use App\Models\Video;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('employees.dashboard', [
            'loactions' => Location::count() ?? 0,
            'videos' => Video::count() ?? 0,
            'employees' => Employee::count() ?? 0,
        ]);
    }
}
