<?php

namespace App\Livewire;

use Livewire\Component;
use PhpMqtt\Client\MqttClient;


class SolaceSubTest extends Component
{
    public function render()
    {
        return view('livewire.solace-sub-test');
    }

    public function mount()
    {
        $server = "wss://mr-connection-8kti4cbi2qy.messaging.solace.cloud";
        $port = "8443";
    }
}
