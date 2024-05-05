<?php

namespace App\Jobs;

use App\Models\ChMessage;
use App\Models\info;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        Public User $user ,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $this->user->info()->update([
            'follower' => 0 ,
            'following' => 0 ,
            'posts_number' => 0,
            'phone' => null,
            'overview' => null,
            'address' => null ,
            'birth' => null ,
            'job' => null ,
            'community_status' => null ,
        ]);

        if($this->user->photo != null){
            $image =  public_path($this->user->photo->path);
            if (file_exists($image)) {
                unlink($image);
            }
            $this->user->photo()->delete();
        }

        foreach ($this->user->post as $post) {
            $files = $post->file;
            foreach ($files as $file) {
                $filePath = public_path($file->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $file->delete();
            }
            $post->delete();
        }

        foreach ($this->user->comment as $comment) {
            $file = $comment->file;
            if($file != null){
                $filePath = public_path($file->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $file->delete();
            }
            $comment->post->decrement('comments_number');
            $comment->delete();
        }

        foreach ($this->user->commentlike as $like) {
            $like->comment->decrement('likes_number');
            $like->delete();
        }

        foreach ($this->user->follow as $following) {
            $following->mind->info->decrement('follower');
            $following->delete();
        }
        foreach ($this->user->followMe as $followers) {
            $followers->user->info->decrement('following');
            $followers->delete();
        }

        foreach ($this->user->like as $like) {
            $like->post->decrement('likes_numbers');
            $like->delete();
        }

        foreach ($this->user->share as $share) {
            $share->post->decrement('share_number');
            $share->delete();
        }

        foreach ($this->user->unreadNotifications as $notify){
            $notify->delete();
        }

        $chats = ChMessage::where('from_id' ,$this->user->id)->orWhere('to_id' , $this->user->id)->get();
        foreach ($chats as $chat) {
            $chat->delete();
        }

    }
}
