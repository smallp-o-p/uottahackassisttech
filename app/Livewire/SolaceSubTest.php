<?php

namespace App\Livewire;

use Livewire\Component;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class SolaceSubTest extends Component
{
    public $mqtt;
    public $count;
    public function render()
    {
        return view('livewire.solace-sub-test');
    }

    public function mount()
    {
        $connectionSettings = (new ConnectionSettings)
            ->setUsername(env('MQTT_AUTH_USERNAME'))
            ->setPassword(env('MQTT_AUTH_PASSWORD'))
            ->setUseTls(true);
        $url_parsed = parse_url(env('MQTT_HOST'));
        //dd($url_parsed);
        $this->mqtt = new MqttClient($url_parsed["host"], $url_parsed["port"], MqttClient::MQTT_3_1_1);

        $this->mqtt->connect($connectionSettings, false);

        $this->mqtt->subscribe('topic1', function () {
            $this->count++;
        });
        $this->mqtt->loop();
    }
}
