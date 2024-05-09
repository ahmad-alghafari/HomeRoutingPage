<?php

namespace App\Jobs;

use App\Events\PostNotifyEvent;
use App\Models\file;
use App\Models\post;
use App\Models\share;
use App\Models\User;
use App\Notifications\FailedpostingNotify;
use App\Notifications\PostNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Posting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct(
        public Post $post,
        public User $user,
    ){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $id = $this->user->id;

        $userIds = User::whereNotIn('id', function ($query) use ($id) {
            $query->select('user_blocker')->from('blocks')->where('user_blocked', $id);
        })->whereIn('id', function ($query) use ($id) {
            $query->select('user_follow')->from('follows')->where('user_follower', $id);
        })->get(['id']);

        foreach ($userIds as $user) {
            $user->notify(new PostNotify($this->post));
            \broadcast(new PostNotifyEvent($user->id ,$this->post ));
        }

    }


}
