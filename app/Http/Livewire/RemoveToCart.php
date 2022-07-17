<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RemoveToCart extends Component
{
    public $announcement;
    public function removeToCart(){
        Auth::user()->cartItem()->detach($this->announcement->id);
        return redirect(request()->header('Referer'));
    }
    public function mount($announcement){
        $this->announcement = $announcement;
    }
    public function render()
    {
        return view('livewire.remove-to-cart');
    }
}
