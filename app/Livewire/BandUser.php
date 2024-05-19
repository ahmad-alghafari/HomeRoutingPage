<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class BandUser extends Component
{
    public User $user ;
    public $isBanded ;
    public function mount(User $user){
        $this->user = $user;
        $this->isBanded = $user->role == 3;
    }

    public function unband()
    {
        $this->user->update(['role' => 1]);
        $this->isBanded = false;
    }

    public function band()
    {
        $this->user->update(['role' => 3]);
        $this->isBanded = true;
    }
    public function render()
    {
        return view('livewire.band-user');
    }
}
