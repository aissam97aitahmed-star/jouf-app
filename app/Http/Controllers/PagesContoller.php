<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesContoller extends Controller
{
    public function welcomeProgram()
    {
        return view('programe_welcome');
    }
    public function permitProgram()
    {
        return view('permit_welcome');
    }
}
