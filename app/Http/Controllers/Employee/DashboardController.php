<?php

namespace App\Http\Controllers\Employee;

use App\Models\Video;
use App\Models\Employee;
use App\Models\Location;
use App\Models\EmployeeServiceContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $serviceContacts = EmployeeServiceContact::where('is_active', true)
            ->orderBy('service_key')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->groupBy('service_key');

        return view('employees.dashboard', [
            'loactions' => Location::count() ?? 0,
            'videos' => Video::count() ?? 0,
            'employees' => Employee::count() ?? 0,
            'serviceContacts' => $serviceContacts,
            'employeeOnboardingSteps' => $user?->onboarding_steps ?? [],
        ]);
    }

    public function acceptTerms(Request $request)
    {
        $user = Auth::user();
        $user->terms_accepted_at = now();
        $user->save();

        return response()->json(['success' => true]);
    }
}
