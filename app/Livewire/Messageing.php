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
    public $message = '' ;
    public $reciver;
    public $prev_reciever;
    public $messageToSend = '' ;
    public $me ;

    public $users;

    public function mount(User $user){
        $this->me = $user;
        $userid = $this->me->id ;

        $this->users = User::whereNotIn('id', function ($query) use ($userid) {
            $query->select('user_blocker')
                ->from('blocks')
                ->where('user_blocked', $userid);
        })->whereIn('id', function ($query) use ($userid) {
            $query->select('user_follower')
                ->from('follows')
                ->where('user_follow', $userid);
        })->take(10)->get(['id' , 'name' , 'email']);
    }

    public function Receiver($reciver_id){
        $user = User::find($reciver_id);
        if($user){
            $this->reciver = $user;
            $this->firstSearch = true;
        }
    }

    public function sendMessage(){
        $this->validate([
            'messageToSend' => 'required'
        ]);

        $message = ChMessage::create([
            'from_id' => $this->me->id ,
            'to_id' => $this->reciver->id ,
            'body' => $this->messageToSend ,
        ]);

        SendingMessage::dispatch(
            $this->messageToSend  ,
            $this->reciver ,
            $message,
        );

        $this->messageToSend = '' ;
    }

    public function deleteChat()  {

    }

    public function render(){
        if($this->reciver != null ){
            $this->message = ChMessage::where('from_id' ,$this->me->id)->where('to_id', $this->reciver->id)->orWhere('from_id' ,$this->reciver->id)->where('to_id', $this->me->id)->orderBy('created_at', 'asc')->get();
        }


        if($this->search == ''){
            $users = $this->users;
        }else{
            $userid = $this->me->id ;
            $users = User::whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
            })->whereIn('id', function ($query) use ($userid) {
                $query->select('user_follower')
                    ->from('follows')
                    ->where('user_follow', $userid);
            })->where('name', 'like', '%' . $this->search . '%')->take(10)->get(['id', 'name', 'email']);
        }


        return view('livewire.messageing', compact('users'));
    }
}
