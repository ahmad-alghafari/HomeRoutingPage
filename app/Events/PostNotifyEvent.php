<?php

namespace App\Events;

use App\Models\post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PostNotifyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $user ;
    public  $id;
    public $user_id;
    public $user_id_broadcast;

    public $user_photo ;
    public $time;
    public function __construct(
        $user_id_broadcast , Post $post
    ){
        $this->id = $post->id;
        $this->user_id = $post->user->id;
        $this->user = $post->user->name;
        $this->user_photo = $post->user->photo != null ? $post->user->photo->path : "null-null";
        $this->time = $post->created_at;
        $this->user_id_broadcast = $user_id_broadcast;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('postNotify'.$this->user_id_broadcast),
        ];
    }

    public function broadcastAs()  {
        return 'Notifications' ;
    }
}
