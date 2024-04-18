<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\follow;

class FollowNotify extends Notification
{
    use Queueable;
    private $follow;

    /**
     * Create a new notification instance.
     */
    public function __construct(follow $follow)
    {
        $this->follow = $follow;
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
            'user_id' => $this->follow->user->id,
            'follower_name' => $this->follow->user->name,
            'title' => ' Started Following You',
        ];
    }
}
