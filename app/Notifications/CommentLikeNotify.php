<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\commentlike;
use App\Models\comment;
use App\Models\post;

class CommentLikeNotify extends Notification
{
    use Queueable;
    private $comment ;
    private $commentlike;
    private $postOfComment;

    /**
     * Create a new notification instance.
     */
    public function __construct(commentlike $commentlike,comment $comment,post $post)
    {
        $this->commentlike = $commentlike;
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
            'id' => $this->commentlike->id ,
            'user' =>$this->commentlike->user->name,
            'user_id' =>$this->commentlike->user->id,
            'title' => ' Liked Your Comment ',
            'comment_id'=> $this->comment->id ,
            'post' =>$this->comment->post->id,
        ];
    }
}
