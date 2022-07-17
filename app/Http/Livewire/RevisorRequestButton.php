<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\BecomeAdvisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorRequestButton extends Component
{
    public $is_sent = false;

    public function sendRequest(){
        Mail::to('admin@presto.it')->send(new BecomeAdvisor(Auth::user()));
        
        $this->emit('sentEmail','Email inviata con successo');
        $this->is_sent = true;
    }

    public function render()
    {
        return view('livewire.revisor-request-button');
    }
}
