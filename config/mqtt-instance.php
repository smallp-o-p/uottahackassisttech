<?php
use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use Psr\Log\LogLevel;
use PhpMqtt\Client\Facades\MQTT;

$connectionSettings = (new ConnectionSettings)
    ->setUsername(env('MQTT_AUTH_USERNAME'))
    ->setPassword(env('MQTT_AUTH_PASSWORD'))
    ->setUseTls(true);
$url_parsed = parse_url(env('MQTT_HOST'));
$mqttglob = new MqttClient($url_parsed["host"], $url_parsed["port"], MqttClient::MQTT_3_1_1);
$mqttglob->connect($connectionSettings, false);

return $mqttglob;
