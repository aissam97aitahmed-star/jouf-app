<?php

namespace App\Http\Controllers\Officer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return view('officer_security.dashboard');
    }
    public function scanner()
    {
        return view('officer_security.scanner');
    }
    public function visitors()
    {
        return view('officer_security.visitors');
    }

    public function notification()
    {
        return view('officer_security.notification');
    }

    public function reports()
    {
        return view('officer_security.reports');
    }

}
