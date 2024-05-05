<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\follow;
use App\Notifications\FollowNotify;
use App\Jobs\Loging;

class FollowLive extends Component{
    public $user;
    public $isFollow ;
    public function mount($user){
        if ($user->id != Auth::user()->id){
            $this->user = $user ;
            $this->isFollow = Auth::user()->follow()->where('user_follower',$this->user->id)->exists();
        }
    }
    public function toggleFollow() :void{
        if ($this->user->id != Auth::user()->id) {
            if($this->isFollow){
                Auth::user()->follow()->where('user_follower' , $this->user->id)->delete();
                Auth::user()->info->decrement('following');
                $this->user->info->decrement('follower');
                $this->isFollow = false ;
            }else{
                $follow = Auth::user()->follow()->create(['user_follower' => $this->user->id]);
                Auth::user()->info->increment('following');
                $this->user->info->increment('follower');
                $this->isFollow = true ;
                $this->user->notify(new FollowNotify($follow));
                $id = Auth::user()->follow();
                Loging::dispatch(
                    Auth::user()->id ,
                    'Create',
                    Auth::user()->name . ' Started Following ' . $this->user->name,
                    'Follows',
                    'home/users/show/' .$this->user->id,
                    '',
                );
            }
        }
    }
    public function render()
    {
        return view('livewire.follow-live');
    }
}
