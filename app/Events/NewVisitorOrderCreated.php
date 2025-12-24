<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewVisitorOrderCreated implements ShouldBroadcast
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function broadcastOn()
    {
        // قناة خاصة بالأمن
        return new Channel('order');
    }

    // public function broadcastAs()
    // {
    //     return 'new-order';
    // }
}
