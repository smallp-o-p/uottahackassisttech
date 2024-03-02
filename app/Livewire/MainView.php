<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Session;
use Livewire\Attributes\On;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class MainView extends Component
{
    public Room $room;


    #[On('select_room')]
    public function changeRoom($session_id, $room_id)
    {
        \Illuminate\Support\Facades\Session::put('selectedRoom', $room_id);
        $newRoom = Room::find($room_id);
        $this->selectedRoom = $newRoom;
    }

    #[On('select_session')]
    public function changeSession($session_id)
    {
        $newRoom = Session::find($session_id)->rooms->first();
        $this->selectedRoom = $newRoom;
    }
    public function render()
    {
        return view('livewire.main-view');
    }

    public function mount(Room $room)
    {
    }


}
