<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClearNotifi extends Component
{
    public function clearing(){
        $user_id = auth()->user()->id;
        DB::table('notifications')->where('notifiable_id', $user_id)->delete();
    }
    public function render(){
        return view('livewire.clear-notifi');
    }
}
