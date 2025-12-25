<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessVideoUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $tempPath,
        public array $data
    ) {}

   public function handle(): void
{
    $originalName = basename($this->tempPath);

    // نقل الفيديو الجديد إلى public/videos
    $path = Storage::disk('public')->putFileAs(
        'videos',
        Storage::disk('local')->path($this->tempPath),
        $originalName
    );

    $this->data['video_path'] = $path;

    // إنشاء فيديو جديد أو تحديث موجود
    if (isset($this->data['old_video_path'])) {
        // حذف القديم
        Storage::disk('public')->delete($this->data['old_video_path']);

        // تحديث بيانات الفيديو الحالي
        $video = Video::where('video_path', $this->data['old_video_path'])->first();
        if ($video) {
            $video->update($this->data);
        }
    } else {
        Video::create($this->data);
    }

    // حذف المؤقت
    Storage::disk('local')->delete($this->tempPath);
}

}
