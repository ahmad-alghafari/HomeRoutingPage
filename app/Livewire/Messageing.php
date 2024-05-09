<?php

namespace App\Livewire;

use App\Events\Messaging;
use App\Jobs\SendingMessage;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ChMessage;

class Messageing extends Component
{
    public $search = '' ;
    public $me ;
    public $users;

    public function mount(User $user){
        $this->me = $user;
        $userid = $this->me->id ;

        $this->users = User::whereNotIn('id', function ($query) use ($userid) {
            $query->select('user_blocker')
                ->from('blocks')
                ->where('user_blocked', $userid);
        })->where('id','!=',$userid)->take(10)->get(['id' , 'name' , 'email' , 'status']);
    }
    public function render(){
        if($this->search == ''){
            $users = $this->users;
        }else{
            $userid = $this->me->id ;
            $users = User::whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
            })->where('id','!=',$userid)->where('name', 'like', '%' . $this->search . '%')->take(10)->get(['id', 'name', 'email' , 'status']);
        }
        return view('livewire.messageing', compact('users'));
    }
}
