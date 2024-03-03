<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;

class OnlineUsers extends Component
{
    public Collection $sessionMembers;


    #[On('select_session')]
    public function listMembers($session_id)
    {
        $sesh = Session::find($session_id);
        $this->sessionMembers = $sesh->users()->get();
    }

    public function render()
    {
        return view('livewire.online-users');
    }

    public function mount()
    {
        $this->sessionMembers = Auth::user()->sessions->first()->users()->get();
    }
}
