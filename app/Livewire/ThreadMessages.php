<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Component;

class ThreadMessages extends Component
{
    public Thread $thread;

    public $test_messages = ["hello hello hello", "lorem ipsum", "foo", "foo", "ffooofooo"];
    public function render()
    {
        return view('livewire.thread-messages');
    }

    public function mount(Thread $thread)
    {

    }
}
