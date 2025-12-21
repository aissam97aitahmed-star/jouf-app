<?php

namespace App\Http\Controllers\Employee;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Enums\PolicyPriority;
use App\Models\PolicyCategory;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function index(Request $request)
    {

        $categories = PolicyCategory::withCount('policies')->get();
        $priorities = PolicyPriority::cases();

        $policies = Policy::with('category')
            ->when($request->category_id, function($query) use ($request) {
                $query->where('policy_category_id', $request->category_id);
            })
            ->when($request->priority, function($query) use ($request) {
                $query->where('priority', $request->priority);
            })
            ->where('is_active', true)
            ->latest()
            ->get();


        return view('employees.privacy',compact('policies', 'categories', 'priorities'));
    }
}
