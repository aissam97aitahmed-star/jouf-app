<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifyEmployee implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    // يمكنك إضافة أي بيانات تريد إرسالها
    public function __construct($message)
    {
        $this->message = $message;
    }

    // قناة عامة (public channel)
    public function broadcastOn()
    {
        return new Channel('employee-notifications'); // اسم القناة العامة
    }

    // اسم الحدث في الجافاسكريبت
    public function broadcastAs()
    {
        return 'new-notification';
    }
}
