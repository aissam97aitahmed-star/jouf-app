<?php

namespace App\Http\Controllers;

use App\Models\HomeVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesContoller extends Controller
{

    public function welcomeProgram()
    {

        if (Auth::check() && Auth::user()->role == "employee") {
            return redirect()->route('employee.dashboard');
        }
        Auth::logout();
        return view('programe_welcome');
    }


    public function permitProgram()
    {
        $homeVideo = HomeVideo::first();
        return view('permit_welcome', compact('homeVideo'));
    }
}
