<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class HomeVideoController extends Controller
{
    public function edit()
    {
        $video = HomeVideo::firstOrCreate([]);
        return view('admin.home-video.edit', compact('video'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'video' => 'nullable|mimes:mp4,webm,ogg|max:51200' // 50MB
        ]);

        $video = HomeVideo::first();

        if ($request->hasFile('video')) {

            // حذف الفيديو القديم
            if ($video->video_path && Storage::disk('public')->exists($video->video_path)) {
                Storage::disk('public')->delete($video->video_path);
            }

            $path = $request->file('video')->store('home-videos', 'public');

            $video->update([
                'video_path' => $path
            ]);
        }
        ToastMagic::success('تم رفع الفيديو بنجاح');

        return back();
    }
}
