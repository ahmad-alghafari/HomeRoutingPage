<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\like;
use App\Notifications\LikeNotify;
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
            Auth::user()->like()->create(['post_id' => $this->post->id]);
            $this->post->increment('likes_number');
            $this->isLiked = true ;
//            notification
            $li = like::latest()->first();
            $postOwner = $li->post->user;
            if (Auth::user()->id != $postOwner->id) {
                $postOwner->notify(new LikeNotify($li,$li->post));
            }
        }
        $this->post = $this->post->fresh();
    }
    public function render()
    {
        return view('livewire.like-live');
    }
}
