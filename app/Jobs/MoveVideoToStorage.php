<?php

namespace App\Jobs;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MoveVideoToStorage implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(
        public string $tempPath,   // temp/abc.mp4
        public string $originalName,
        public array $data
    ) {}

    public function handle(): void
    {
        // تأكد من وجود المجلد
        Storage::disk('public')->makeDirectory('videos');

        $safeName = Str::slug(
            pathinfo($this->originalName, PATHINFO_FILENAME)
        );

        $extension = pathinfo($this->originalName, PATHINFO_EXTENSION);

        $finalPath = 'videos/' . uniqid() . '_' . $safeName . '.' . $extension;

        // ✅ نقل من local → public
        Storage::disk('public')->put(
            $finalPath,
            Storage::disk('local')->get($this->tempPath)
        );

        // حذف المؤقت
        Storage::disk('local')->delete($this->tempPath);

        $this->data['video_path'] = $finalPath;

        ProcessVideoMeta::dispatch($this->data);
    }
}
