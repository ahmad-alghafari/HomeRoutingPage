<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class Messaging implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $reciverId ;
    public $message ;
    public $senderId;
    public $user_photo;
    public $senderName;

    public function __construct(User $reciver , $message , User $sender){
        $this->reciverId = $reciver->id ;
        $this->message = $message ;
        $this->senderId = $sender->id ;
        $this->user_photo = $sender->photo != null ? $sender->photo->path : "null-null";
        $this->senderName = $sender->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat'.$this->reciverId ),
        ];
    }

    public function broadcastAs()  {
        return 'chatMessage' ;
    }
}
