<?php

namespace App\Livewire;

use App\Models\Message;
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
    public $messages;
    public $enteredText;

    public $thereIsAnAnswer;
    public function render()
    {
        return view('livewire.thread-messages');
    }

    public function mount(Thread $thread)
    {
        $this->messages = $thread->messages()->get();
        if ($this->messages->where('marked_as_answer', '1')) {
            $this->thereIsAnAnswer = true;
        } else {
            $this->thereIsAnAnswer = false;
        }
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

    public function mark_answer($message_id)
    {
        $message = Message::find($message_id);
        $message->marked_as_answer = true;
        $message->save();
        $this->dispatch('added_message');
    }
}
