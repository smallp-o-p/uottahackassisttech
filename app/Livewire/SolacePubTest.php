<?php

namespace App\Livewire;

use Livewire\Component;
use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use Psr\Log\LogLevel;
use PhpMqtt\Client\Facades\MQTT;

class SolacePubTest extends Component
{
    public function render()
    {
        return view('livewire.solace-pub-test');
    }

    public function pub()
    {
        dd("hi");
    }

    public function mount()
    {
    }
}
