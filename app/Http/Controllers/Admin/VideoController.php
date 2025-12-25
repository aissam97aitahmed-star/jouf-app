<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Jobs\ProcessVideoUpload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

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
        // 1️⃣ تحقق من البيانات النصية فقط (بدون ملفات)
        $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'nullable|string|max:255',
            'video_path' => 'required',
            'thumbnail'  => 'nullable|image|max:2048',
        ]);

        // 2️⃣ أنشئ data يدويًا (نظيف)
        $data = [
            'title'    => $request->title,
            'category' => $request->category,
        ];

        // 3️⃣ key_points
        if ($request->filled('key_points')) {
            $data['key_points'] = array_values(
                array_filter(
                    preg_split("/\r\n|\n|\r/", $request->key_points)
                )
            );
        }

        // 4️⃣ thumbnail → خزّن الآن ومرر path فقط
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('thumbnails', 'public');
        }

        // 5️⃣ Chunk upload
        $receiver = new FileReceiver(
            'video_path',
            $request,
            HandlerFactory::classFromRequest($request)
        );

        if (!$receiver->isUploaded()) {
            return response()->json(['success' => false], 400);
        }

        $save = $receiver->receive();

        if (!$save->isFinished()) {
            return response()->json(['status' => 'chunk uploaded']);
        }

        // 6️⃣ الملف اكتمل
        $file = $save->getFile();
        $tempPath = $file->store('temp');

        // dump($data);


        // ✅ هنا لا يوجد UploadedFile إطلاقًا
        ProcessVideoUpload::dispatch($tempPath, $data);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Video is being processed in background'
        // ]);

        ToastMagic::success('تم الفيديو بنجاح');

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


    protected function deleteIfExists($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }


public function update(Request $request, Video $video)
{
    // 1️⃣ تحقق من البيانات النصية فقط
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'nullable|string|max:255',
        'target_group' => 'nullable|string|max:255',
        'is_required' => 'boolean',
        'description' => 'nullable|string',
        'what_you_will_learn' => 'nullable|string',
        'duration' => 'nullable|integer',
        'video_path' => 'nullable', // فيديو جديد chunked
        'thumbnail' => 'nullable|image',
        'key_points' => 'nullable|string',
    ]);

    // 2️⃣ تحويل key_points من نص إلى array
    if (!empty($data['key_points'])) {
        $data['key_points'] = array_values(array_filter(preg_split("/\r\n|\n|\r/", $data['key_points'])));
    }

    // 3️⃣ معالجة الصورة أولًا (حتى نحصل على path نصي)
    if ($request->hasFile('thumbnail')) {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $data['thumbnail'] = $thumbnailPath; // فقط path نصي
    }

    // 4️⃣ إذا تم رفع فيديو جديد chunked
    if ($request->has('video_path')) {
        $receiver = new FileReceiver(
            'video_path',
            $request,
            HandlerFactory::classFromRequest($request)
        );

        if (!$receiver->isUploaded()) {
            return response()->json(['error' => 'فشل تحميل الملف'], 400);
        }

        $save = $receiver->receive();

        if (!$save->isFinished()) {
            return response()->json(['status' => 'chunk uploaded']);
        }

        $file = $save->getFile();
        $tempPath = $file->store('temp'); // ⚡ هذا path نصي فقط

        // إرسال الـ Job بدون UploadedFile
        ProcessVideoUpload::dispatch($tempPath, [
            'old_video_path' => $video->video_path,
            'title' => $data['title'],
            'category' => $data['category'] ?? null,
            'key_points' => $data['key_points'] ?? null,
            'thumbnail' => $data['thumbnail'] ?? null, // path نصي فقط
        ]);

        unset($data['video_path']); // حتى لا يحذف القديم
    }

    // 5️⃣ تحديث البيانات النصية فقط
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
