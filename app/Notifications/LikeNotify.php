<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Post;
use App\Models\like;

class LikeNotify extends Notification
{
    use Queueable;
    private $like ;

    /**
     * Create a new notification instance.
     */
    public function __construct(like $li,post $post)
    {
        $this->like = $li;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toDatabase(object $notifiable): array
    {
        return [
            'id' => $this->like->id ,
            'user' =>$this->like->user->name,
            'title' => ' Liked Your Post ',
            'post_id'=> $this->post->id ,
            'photo' =>  $this->like->user->photo->path,
        ];
    }
}
