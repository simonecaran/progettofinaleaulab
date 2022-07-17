<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Favorites extends Component
{
    public $announcement;
    public $contain;

    public function render()
    {
        return view('livewire.favorites');
    }
    public function mount($announcement){
        $this->announcement = $announcement;
        if(Auth::user()){
            $this->contain = Auth::user()->favouriteAnnouncements->contains($announcement);
        }
    }
    
    public function like(){
        if(Auth::user()){
            if(!Auth::user()->favouriteAnnouncements->contains($this->announcement)){
                
                Auth::user()->favouriteAnnouncements()->attach($this->announcement->id);
                $this->contain = true;
    
            }
            else{
                Auth::user()->favouriteAnnouncements()->detach($this->announcement->id);
                $this->contain = false;
            }
        }
    }
}
