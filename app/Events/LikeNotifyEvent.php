<?php

namespace App\Events;

use App\Models\like;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LikeNotifyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id ;
    public $user;
    public $time;
    public $user_photo;
    public $user_id_broadcast;
    public function __construct(like $like , $id){
        $this->id = $like->post->id;
        $this->user = $like->user->name;
        $this->time = $like->created_at;
        $this->user_photo = $like->user->photo != null ? $like->user->photo->path : "null-null" ;
        $this->user_id_broadcast = $id ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('likeNotify'.$this->user_id_broadcast),//Notifications
        ];
    }

    public function broadcastAs()  {
        return 'Notifications' ;
    }
}
