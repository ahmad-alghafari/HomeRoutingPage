<?php

namespace App\Livewire;

use Livewire\Component;

class RouteEditing extends Component
{
    public $isOf;
    public $route;
    public function mount($route){
        $this->route = $route;
        $this->isOf = $route->servicing == 0 ? false : true;
    }

    public function toggleRunning(){
        if($this->isOf){
            $this->route->update(['servicing' => "0"]);
            $this->isOf = false ;
        }else{
            $this->route->update(['servicing' => "1"]);
            $this->isOf = true;
        }
    }
    public function render()
    {
        return view('livewire.route-editing');
    }
}
