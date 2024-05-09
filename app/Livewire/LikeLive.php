<?php

namespace App\Livewire;
use App\Events\LikeNotifyEvent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\like;
use App\Notifications\LikeNotify;
use App\Jobs\Loging;
use function broadcast;

class LikeLive extends Component
{
    public $post ;
    public $isLiked ;
    public function mount($post){
        $this->post = $post;
        $this->isLiked =  Auth::user()->like()->where('post_id',$this->post->id)->exists();
    }
    public function toggleLike(): void
    {
        if($this->isLiked){
            Auth::user()->like()->where('post_id',$this->post->id)->delete();
            $this->post->decrement('likes_number');
            $this->isLiked = false ;
        }else{
            $like = Auth::user()->like()->create(['post_id' => $this->post->id]);
            $this->post->increment('likes_number');
            $this->isLiked = true ;

            if(Auth::user()->id != $this->post->user_id){
                $this->post->user->notify(new LikeNotify($like));
                broadcast(new LikeNotifyEvent($like ,$this->post->user->id));
            }

            //log
            Loging::dispatch(
                Auth::user()->id ,
                'create',
                Auth::user()->name . ' liked ' . $this->post->user->name . ' post , id : ' . $this->post->id .'.',
                'likes',
                'home/posts/show/' .$this->post->id,
                '',
            );
        }
        $this->post = $this->post->fresh();
    }
    public function render()
    {
        return view('livewire.like-live');
    }
}
