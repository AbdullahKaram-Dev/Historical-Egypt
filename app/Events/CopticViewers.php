<?php

namespace App\Events;

use App\Models\Coptic;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CopticViewers
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rows;

    public function __construct(Coptic $rows)
    {
        $this->rows = $rows;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
