<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'target_group' => 'nullable|string|max:255',
            'is_required' => 'boolean',
            'description' => 'nullable|string',
            'what_you_will_learn' => 'nullable|string',
            'duration' => 'nullable|integer',
            'video_path' => 'required|file|mimes:mp4,mov,avi',
            'thumbnail' => 'nullable|image',
            'key_points' => 'nullable|string',
        ]);

        // تحويل key_points من نص إلى array
        if (!empty($data['key_points'])) {
            $data['key_points'] = array_values(array_filter(preg_split("/\r\n|\n|\r/", $data['key_points'])));
        }

        if ($request->hasFile('video_path')) {
            $data['video_path'] = $request->file('video_path')->store('videos', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Video::create($data);
        ToastMagic::success('تم إضافة الفيديو بنجاح');

        return redirect()->route('admin.videos.index');
    }

    public function show(Video $video)
    {
        $video->increment('views');
        return view('admin.videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'target_group' => 'nullable|string|max:255',
            'is_required' => 'boolean',
            'description' => 'nullable|string',
            'what_you_will_learn' => 'nullable|string',
            'duration' => 'nullable|integer',
            'video_path' => 'nullable|file|mimes:mp4,mov,avi',
            'thumbnail' => 'nullable|image',
            'key_points' => 'nullable|string',
        ]);

        // تحويل key_points من نص إلى array
        if (isset($data['key_points'])) {
            $data['key_points'] = array_values(array_filter(preg_split("/\r\n|\n|\r/", $data['key_points'])));
        }

        if ($request->hasFile('video_path')) {
            Storage::disk('public')->delete($video->video_path);
            $data['video_path'] = $request->file('video_path')->store('videos', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($video->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $video->update($data);
        ToastMagic::success('تم تحديث الفيديو بنجاح');

        return redirect()->route('admin.videos.index');
    }

    public function destroy(Video $video)
    {
        Storage::disk('public')->delete([$video->video_path, $video->thumbnail]);
        $video->delete();

        return response()->json(['success' => true]);
    }
}
