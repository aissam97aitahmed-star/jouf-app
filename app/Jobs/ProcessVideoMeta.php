<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessVideoMeta implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(public array $data) {}

    public function handle(): void
    {
        $videoPath = Storage::disk('public')->path($this->data['video_path']);

        // 🔥 Optional (later)
        // $this->data['duration'] = getVideoDuration($videoPath);
        // $this->data['thumbnail_auto'] = generateThumbnail($videoPath);

        SaveVideoToDatabase::dispatch($this->data);
    }
}

