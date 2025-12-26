<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Jobs\MoveVideoToStorage;
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
        // 1️⃣ Validate (بدون video file)
        $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'nullable|string|max:255',
            'video_path' => 'required',
            'thumbnail'  => 'nullable|image|max:2048',
        ]);

        // 2️⃣ Prepare clean data
        $data = [
            'title'    => $request->title,
            'category' => $request->category,
            'duration' => $request->duration,
            'is_required' => $request->boolean('is_required'),
            'description' => $request->description,
            'what_you_will_learn' => $request->what_you_will_learn,
        ];

        // 3️⃣ Key points
        if ($request->filled('key_points')) {
            $data['key_points'] = array_values(array_filter(
                preg_split("/\r\n|\n|\r/", $request->key_points)
            ));
        }

        // 4️⃣ Thumbnail (store now – light file)
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

        // ✅ خزّنه فورًا داخل Laravel storage
        $tempPath = $file->store('temp');
        // مثال: temp/abc123.mp4

        MoveVideoToStorage::dispatch(
            $tempPath,                        // Laravel-managed path
            $file->getClientOriginalName(),
            $data
        );

        ToastMagic::success('جاري معالجة الفيديو في الخلفية');
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
    /**
     * 1️⃣ Validate (بدون ملفات)
     */
    $data = $request->validate([
        'title'             => 'required|string|max:255',
        'category'          => 'nullable|string|max:255',
        'target_group'      => 'nullable|string|max:255',
        'is_required'       => 'boolean',
        'description'       => 'nullable|string',
        'what_you_will_learn'=> 'nullable|string',
        'duration'          => 'nullable|integer',
        'video_path'        => 'nullable', // chunked
        'thumbnail'         => 'nullable|image|max:2048',
        'key_points'        => 'nullable|string',
    ]);

    /**
     * 2️⃣ key_points → array
     */
    if ($request->filled('key_points')) {
        $data['key_points'] = array_values(
            array_filter(
                preg_split("/\r\n|\n|\r/", $request->key_points)
            )
        );
    }

    /**
     * 3️⃣ thumbnail (يُخزّن الآن)
     */
    if ($request->hasFile('thumbnail')) {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $data['thumbnail'] = $request
            ->file('thumbnail')
            ->store('thumbnails', 'public');
    }

    /**
     * 4️⃣ Chunked Video Upload (اختياري)
     */
    if ($request->has('video_path')) {

        $receiver = new FileReceiver(
            'video_path',
            $request,
            HandlerFactory::classFromRequest($request)
        );

        if (!$receiver->isUploaded()) {
            return response()->json(['error' => 'فشل تحميل الفيديو'], 400);
        }

        $save = $receiver->receive();

        if (!$save->isFinished()) {
            return response()->json(['status' => 'chunk uploaded']);
        }

        // ✅ الملف اكتمل
        $file = $save->getFile();

        // 🔐 خزّنه فورًا داخل Laravel storage
        $tempPath = $file->store('temp');

        // 🚀 Job
        MoveVideoToStorage::dispatch(
            $tempPath,
            $file->getClientOriginalName(),
            [
                'video_id'        => $video->id,
                'old_video_path'  => $video->video_path,
            ]
        );

        // ❗ لا نلمس video_path هنا
        unset($data['video_path']);
    }

    /**
     * 5️⃣ تحديث البيانات النصية فقط
     */
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
