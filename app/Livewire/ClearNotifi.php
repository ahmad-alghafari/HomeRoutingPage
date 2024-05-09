<?php

namespace App\Livewire;

use App\Jobs\ClearNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClearNotifi extends Component
{
    public $likesNumber ;
    public $userId;
    public function mount(){
        $this->likesNumber = Auth::user()->unreadNotifications->count();
        $this->userId = Auth::user()->id;
    }
    public function clearing(){
        $this->likesNumber = 0 ;
        ClearNotifications::dispatch($this->userId);
    }
    public function render(){
        return view('livewire.clear-notifi');
    }
}
