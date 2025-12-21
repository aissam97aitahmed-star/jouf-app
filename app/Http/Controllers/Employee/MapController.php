<?php

namespace App\Http\Controllers\Employee;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function index()
    {
        $locations = Location::with('facilities')->get();
        // return $locations;
        return view('employees.map', compact('locations'));
    }
}
