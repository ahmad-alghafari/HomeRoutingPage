<?php

namespace App\Livewire;

use App\Models\domain;
use Livewire\Component;

class Domains extends Component
{
    public domain $domain;
    public $state;

    public  function mount(domain $domain , $state){
        $this->domain = $domain;
        $this->state = $state;
    }
    public function toggleOf(){
        $this->domain->update(['online' => "no"]);
    }
    public function toggleOn(){
        $this->domain->update(['online' => "yes"]);
    }

    public function deleteing(){
        $this->domain->delete();
    }

    public function render()
    {
        return view('livewire.domains');
    }
}
