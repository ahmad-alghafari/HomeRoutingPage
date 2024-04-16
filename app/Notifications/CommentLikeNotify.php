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
    private $cmt ;
    private $cmtlike;
    private $postOfComment;

    /**
     * Create a new notification instance.
     */
    public function __construct(commentlike $cmtl,comment $cmt,post $postOfComment)
    {
        $this->commentlike = $cmtl;
        $this->comment = $cmt;
        $this->post = $postOfComment;
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
            'title' => ' Liked Your Comment ',
            'comment_id'=> $this->comment->id ,
            'post' =>$this->comment->post->id,
            'photo' =>  $this->commentlike->user->photo->path,
        ];
    }
}
