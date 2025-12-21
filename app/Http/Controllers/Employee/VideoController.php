<?php

namespace App\Http\Controllers\Employee;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        // return $videos;
        return view('employees.videos', compact('videos'));
    }

    public function incrementViews(Video $video)
    {
        $video->increment('views');
        return response()->json(['views' => $video->views]);
    }
}
