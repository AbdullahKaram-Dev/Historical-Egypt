<?php

namespace App\Events;

use App\Models\Pharaonic;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PharaonicViewers
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rows;

    public function __construct(Pharaonic $rows)
    {
            $this->rows = $rows;

    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
