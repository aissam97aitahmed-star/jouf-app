<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Enums\PolicyPriority;
use App\Models\PolicyCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PrivacyController extends Controller
{
    public function index(Request $request)
    {
        $currentUserId = Auth::id();
        $employeesCount = User::where('role', 'employee')->count();
        // $policies = Policy::withCount('viewers')->get();
        // return $policies;
        $categories = PolicyCategory::withCount('policies')->get();
        $priorities = PolicyPriority::cases();

        $policies = Policy::withCount([
            'viewers as viewers_count' => function ($query) {
                $query->where('role', 'employee');
            },
        ])->withExists([
            'viewers as viewed_by_user' => function ($query) use ($currentUserId) {
                $query->where('users.id', $currentUserId);
            },
        ])->with('category')
            ->when($request->category_id, function ($query) use ($request) {
                $query->where('policy_category_id', $request->category_id);
            })
            ->when($request->priority, function ($query) use ($request) {
                $query->where('priority', $request->priority);
            })
            ->where('is_active', true)
            ->latest()
            ->get();


        return view('employees.privacy', compact('policies', 'categories', 'priorities', 'employeesCount'));
    }


    public function download(Policy $policy)
    {
        try {
            $policy->increment('downloads');

            return Storage::disk('public')
                ->download($policy->pdf_path, $policy->title . '.pdf');
        } catch (\Throwable $th) {
            ToastMagic::info('الملف غير متاح الان ');
            return back();
        }
    }

    public function view(Policy $policy)
    {
        return redirect()->to(
            asset('storage/' . $policy->pdf_path)
        );
    }

    public function acknowledgeView(Policy $policy)
    {
        $user = Auth::user();

        if ($user && $user->role === 'employee') {
            $policy->viewers()->syncWithoutDetaching([$user->id]);
        }

        return response()->json([
            'success' => true,
            'message' => 'تم تسجيل الاطلاع على السياسة بنجاح.',
        ]);
    }
}
