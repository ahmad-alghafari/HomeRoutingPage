<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostNotify extends Notification
{
    use Queueable;
    private $post;

    /**
     * Create a new notification instance.
     */
    public function __construct(post $post)
    {
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
            'id' => $this->post->id ,
            'user' => Auth::user()->name,
            'user_id' => $this->post->user->id,
            'title' => ' has published a post ',
        ];
    }
}
