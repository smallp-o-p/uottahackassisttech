<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Redis;
use Livewire\Component;
use Illuminate\Support\Str;

class CollabTextEditor extends Component
{

    public $random;

    public $permission = 'false';
    public function render()
    {
        $this->text = Redis::get($this->random);
        return view('livewire.collab-text-editor');
    }

    public function mount()
    {
        if (is_null(request()->random)) {
            $this->random = Str::random(6);
            $this->permission = 'true';
        } else {
            $this->permission = 'false';
        }
    }

    public function test()
    {
        dd("hi");
        Redis::set('fun', 'yay');
        dd(Redis::get('fun'));
    }
}
