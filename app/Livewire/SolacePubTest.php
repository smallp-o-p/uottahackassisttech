<?php

namespace App\Livewire;

use Livewire\Component;
use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use Psr\Log\LogLevel;
use PhpMqtt\Client\Facades\MQTT;

class SolacePubTest extends Component
{

    public $mqtt;
    public function render()
    {
        return view('livewire.solace-pub-test');
    }

    public function pub()
    {
        $this->mqtt->publish('topic1', 'yippeee');
    }

    public function mount()
    {
        $connectionSettings = (new ConnectionSettings)
            ->setUsername(env('MQTT_AUTH_USERNAME'))
            ->setPassword(env('MQTT_AUTH_PASSWORD'))
            ->setUseTls(true);
        $url_parsed = parse_url(env('MQTT_HOST'));
        //dd($url_parsed);
        $mqtt = new MqttClient($url_parsed["host"], $url_parsed["port"], MqttClient::MQTT_3_1_1);

        $mqtt->connect($connectionSettings, false);

        $this->mqtt = $mqtt;

    }
}
