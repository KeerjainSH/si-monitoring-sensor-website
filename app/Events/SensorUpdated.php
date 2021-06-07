<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SensorUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sensor ;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sensor)
    {
        // this->sensor = $sensor ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('rt-sensor');
    }

    public function broadcastWith()
    {
        // return [
        //     'id' => $this->sensor->id,
        //     'sensor1' => $this->sensor->sensor1,
        //     'sensor2' => $this->sensor->sensor2,
        //     'sensor3' => $this->sensor->sensor3,
        //     'sensor4' => $this->sensor->sensor4,
        //     'sensor5' => $this->sensor->sensor5,
        //     'timestamp' => $this->sensor->created_at
        // ];
    }
}
