<?php

namespace App\Livewire;

use App\Jobs\DeleteLogs;
use App\Models\Log;
use Carbon\Carbon;
use Livewire\Component;

class Logs extends Component
{
    public $date = '';
    public function deleteing(){
        if($this->date != ''){
            DeleteLogs::dispatch($this->date);
        }
    }
    public function week(){
        $oneWeekAgo = Carbon::now()->subDays(7);
        $this->date = $oneWeekAgo->toDateString();
        $this->deleteing();
    }
    public function month(){
        $oneWeekAgo = Carbon::now()->subMonths(1);
        $this->date = $oneWeekAgo->toDateString();
        $this->deleteing();

    }
    public function year(){
        $oneWeekAgo = Carbon::now()->subYears(1);
        $this->date = $oneWeekAgo->toDateString();
        $this->deleteing();
    }
    public function render(){
        return view('livewire.logs');
    }
}
