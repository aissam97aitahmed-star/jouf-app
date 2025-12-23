<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->role == "security_officer") {
            return redirect()->route('officer_security.dashboard');
        }
        Auth::logout();

        return view('manager_security.login');
    }

}
