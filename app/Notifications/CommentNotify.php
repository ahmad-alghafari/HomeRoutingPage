<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\comment;
use App\Models\Post;

class CommentNotify extends Notification
{
    use Queueable;
    private $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct(comment $comment)
    {
        $this->comment = $comment;
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
            'id' => $this->comment->id ,
            'user' =>$this->comment->user->name,
            'user_id' => $this->comment->user->id,
            'title' => ' Commented on Your Post ',
            'post_id'=> $this->comment->post->id ,
        ];
    }
}
