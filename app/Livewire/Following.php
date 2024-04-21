<?php

namespace App\Livewire;

use App\Models\block;
use App\Models\follow;
use App\Models\User;
use App\Notifications\FollowNotify;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Following extends Component
{
    public $search = '' ;
    public $id;
    public $choice = '';

    public function mount($id , $page){
        $this->choice = $page;
        $this->id = $id;
    }

    public function follow($id){
        $follow = Auth::user()->follow()->create(['user_follower' => $id]);
        Auth::user()->info->increment('following');
        $user = User::find($id);
        $user->info->increment('follower');
        $this->user->notify(new FollowNotify($follow));
    }

    public function unfollow($id){
        $user = User::find($id);
        Auth::user()->follow()->where('user_follower' , $this->user->id)->delete();
        Auth::user()->info->decrement('following');
        $user->info->decrement('follower');
    }



    public function followers(){
        $this->choice = 'followers';
    }

    public function following(){
        $this->choice = 'following';
    }

    public function render(){
        if($this->choice == 'following'){
            $users = User::whereIn('id' , function ($q) {
                $q->select('user_follower')->from('follows')->where('user_follow', $this->id);
            })->where('name' , 'like' ,'%'.$this->search.'%')->get(['id' , 'name' ]);

            return view('livewire.following' , compact('users'));
        }
        $users = User::whereIn('id' , function ($q) {
            $q->select('user_follow')->from('follows')->where('user_follower', $this->id);
        })->where('name' , 'like' ,'%'.$this->search.'%')->get(['id' , 'name' ]);
        return view('livewire.following' , compact('users'));
    }
}
