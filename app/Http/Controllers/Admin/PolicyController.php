<?php

namespace App\Http\Controllers\Admin;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Enums\PolicyPriority;
use App\Models\PolicyCategory;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PolicyController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.policies.index', [
            'policies'   => Policy::with('category')->latest()->get(),
            'categories' => PolicyCategory::all(),
            'priorities' => PolicyPriority::cases(),
        ]);
    }

    public function show(Policy $policy)
    {
        $policy->increment('views');

        return view('employees.policies.show', compact('policy'));
    }

    public function create()
    {
        $categories = PolicyCategory::all();
        return view('admin.policies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'policy_category_id' => 'required|exists:policy_categories,id',
            'description' => 'nullable|string',
            'priority' => ['required', Rule::in(PolicyPriority::values())],
            'pdf' => 'nullable|file|mimes:pdf',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('pdf')) {
            $data['pdf_path'] = $request->file('pdf')->store('policies', 'public');
        }

        Policy::create($data);
        ToastMagic::success('تم إضافة السياسة');

        return redirect()->route('admin.policies.index');
    }

    public function edit(Policy $policy)
    {
        return view('admin.policies.edit', [
            'policy' => $policy,
            'categories' => PolicyCategory::all(),
            'priorities' => PolicyPriority::cases(),
        ]);
    }

   public function update(Request $request, Policy $policy)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'policy_category_id' => 'required|exists:policy_categories,id',
        'description' => 'nullable|string',
        'priority' => ['required', Rule::in(PolicyPriority::values())],
        'pdf' => 'nullable|file|mimes:pdf',
        'is_active' => 'nullable|boolean',
    ]);

    // التعامل مع checkbox is_active
    // $data['is_active'] = $request->has('is_active') ? 1 : 0;

    // التعامل مع PDF إذا تم رفعه
    if ($request->hasFile('pdf')) {
        $data['pdf_path'] = $request->file('pdf')->store('policies', 'public');
    }

    $policy->update($data);

    ToastMagic::success('تم تحديث السياسة');

    return redirect()->route('admin.policies.index');
}


    public function destroy(Policy $policy)
    {
        $policy->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
