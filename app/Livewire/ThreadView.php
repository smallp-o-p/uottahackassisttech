<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Component;
use App\Models\User;

class ThreadView extends Component
{

    public Thread $thread;
    public function render()
    {
        return view('livewire.thread-view');
    }

    public function mount(Thread $thread)
    {
    }
}
