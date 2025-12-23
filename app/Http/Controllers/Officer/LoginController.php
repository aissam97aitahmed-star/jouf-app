<?php

namespace App\Http\Controllers\Officer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->role == "security_manager") {
            return redirect()->route('security_manager.dashboard');
        }
        Auth::logout();
        return view('officer_security.login');
    }
}
