<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateThread extends Component
{
    public $sessions;

    public $selectedSession;

    public $selectedRoom;

    public $secondRow;
    #[Validate('required|min:3')]
    public $question;

    public function render()
    {
        $this->secondRow = \App\Models\Session::find($this->selectedSession)->rooms;
        return view('livewire.create-thread');
    }
    public function mount()
    {
        $this->sessions = Auth::user()->sessions;
        $this->selectedSession = $this->sessions->first()->id;
    }


    public function createThread($room_id)
    {
        $thread = Room::find($room_id)->threads()->create([
            'title' => $this->question,
            'asked_by' => Auth::user()->id
        ]);
        dd($thread);
    }
}
