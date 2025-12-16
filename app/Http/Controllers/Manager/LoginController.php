<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('manager_security.login');
    }

    public function login(Request $request)
    {

        try {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('manager')->attempt($credentials, $request->filled('remember'))) {
                return redirect()->intended(route('manager.dashboard'));
            }

            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        } catch (\Throwable $th) {
            return  $th->getMessage();
        }


        // $credentials = $request->only('email', 'password');

        // if (Auth::guard('manager')->attempt($credentials, $request->filled('remember'))) {
        //     return redirect()->intended(route('manager.dashboard'));
        // }

        // return back()->withErrors([
        //     'email' => 'Invalid credentials.',
        // ]);
    }

    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect()->route('manager.login');
    }
}
