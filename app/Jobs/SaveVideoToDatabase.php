<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SaveVideoToDatabase implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(public array $data) {}

    public function handle(): void
    {
        // سجل البيانات لتتأكد منها
        Log::debug('SaveVideoToDatabase data: ', $this->data);

        if (isset($this->data['old_video_path'])) {
            $video = Video::where('video_path', $this->data['old_video_path'])->first();

            if ($video) {
                $video->update($this->data);
                Storage::disk('public')->delete($this->data['old_video_path']);
            } else {
                Video::create($this->data);
            }
        } else {
            Video::create($this->data);
        }
    }

    public function failed(\Exception $exception)
    {
        Log::error('SaveVideoToDatabase failed: ' . $exception->getMessage());
    }
}
