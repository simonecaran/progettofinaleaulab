<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $announcement;
    public $contain;
    public function setInCart(){
    if(Auth::user()){
            
        if(!Auth::user()->cartItem->contains($this->announcement)){
            Auth::user()->cartItem()->attach($this->announcement->id);
            $this->contain = true;
        }
        else{
            Auth::user()->cartItem()->detach($this->announcement);
            $this->contain = false;
        }
    }
    }
    
    public function mount($announcement){
        $this->announcement = $announcement;
        $this->contain = Auth::user()->cartItem->contains($this->announcement->id);
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
