<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')
            ->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'role' => 'required|in:security_manager,security_officer,employee,admin',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'onboarding_steps_text' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'onboarding_steps' => $this->prepareOnboardingSteps($request),
        ]);

        ToastMagic::success('تم إضافة المستخدم بنجاح');
        return redirect()->route('admin.users.index');
    }


    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'role' => 'required|in:security_manager,security_officer,employee,admin',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'onboarding_steps_text' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'onboarding_steps' => $this->prepareOnboardingSteps($request),
        ];

        // تحديث كلمة المرور فقط إذا تم إدخالها
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        ToastMagic::success('تم تحديث بيانات المستخدم بنجاح');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'تم حذف المستخدم بنجاح'
        ]);
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        ToastMagic::success('تم استيراد الموظفين بنجاح!');
        return back();
    }

    protected function prepareOnboardingSteps(Request $request): ?array
    {
        if ($request->role !== 'employee') {
            return null;
        }

        $steps = collect(preg_split('/\r\n|\r|\n/', (string) $request->input('onboarding_steps_text')))
            ->map(function ($step) {
                return trim((string) $step);
            })
            ->filter()
            ->values()
            ->all();

        return empty($steps) ? null : $steps;
    }
}


