<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use Psr\Log\LogLevel;
use PhpMqtt\Client\Facades\MQTT;

class ThreadMessages extends Component
{
    public Thread $thread;

    #[Validate('required|min:3')]
    public $enteredText;
    public function render()
    {
        return view('livewire.thread-messages');
    }

    public function mount(Thread $thread)
    {
    }

    public function sendMessage()
    {
        $message = $this->thread->messages()->create([
            'text' => $this->enteredText,
            'user_id' => Auth::user()->id,
            'marked_as_answer' => 0,
        ]);
        $this->dispatch('added_message');
        $this->enteredText = '';

    }
}
