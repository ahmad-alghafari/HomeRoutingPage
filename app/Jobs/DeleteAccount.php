<?php

namespace App\Jobs;

use App\Models\ChMessage;
use App\Models\notification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(Public User $user){}

    /**
     * Execute the job.
     */
    public function handle(): void {
        if($this->user->photo != null){
            $image =  public_path($this->user->photo->path);
            if (file_exists($image)) {
                unlink($image);
            }
        }

        foreach ($this->user->post as $post) {
            $files = $post->file;
            foreach ($files as $file) {
                $filePath = public_path($file->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        foreach ($this->user->comment as $comment) {
            $file = $comment->file;
            if($file != null){
                $filePath = public_path($file->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $comment->post->decrement('comments_number');
        }

        foreach ($this->user->commentlike as $like) {
            $like->comment->decrement('likes_number');
        }

        foreach ($this->user->follow as $following) {
            $following->mind->info->decrement('follower');
        }
        foreach ($this->user->followMe as $followers) {
            $followers->user->info->decrement('following');
        }

        foreach ($this->user->like as $like) {
            $like->post->decrement('likes_numbers');
        }

        foreach ($this->user->share as $share) {
            $share->post->decrement('share_number');
        }


        $chats = ChMessage::where('from_id' ,$this->user->id)->orWhere('to_id' , $this->user->id)->get();
        foreach ($chats as $chat) {
            $chat->delete();
        }


        notification::chunk(100 , function ($notifications){
            foreach ($notifications as $notification) {
                if($notification->notifiable_id == $this->user->id){
                    $notification->delete();
                    continue;
                }
                if(json_decode($notification->data)->user_id == $this->user->id){
                    $notification->delete();
                }
            }
        });

        User::find($this->user->id)->delete();
    }
}
