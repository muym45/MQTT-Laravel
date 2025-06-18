<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MQTTService
{
    public static function connect()
    {
        return new MqttClient('projectsiot.cloud.shiftr.io', 1883, 'laravel_dashboard');
    }

    public static function subscribe()
    {
        $mqtt = self::connect();

        $connectionSettings = (new ConnectionSettings)
            ->setUsername('projectsiot')
            ->setPassword('YYvh8bDGdFpr7Z5p');

        $mqtt->connect($connectionSettings, true);

        $mqtt->subscribe('iot/data', function (string $topic, string $message) {
            $data = json_decode($message, true);
            \App\Models\SensorData::create([
                'temperature' => $data['temperature'],
                'humidity' => $data['humidity']
            ]);
        }, 0);

        $mqtt->loop(true);
    }

    public static function publish($servo, $lcd)
    {
        $mqtt = self::connect();

        $connectionSettings = (new ConnectionSettings)
            ->setUsername('projectsiot')
            ->setPassword('YYvh8bDGdFpr7Z5p');

        $mqtt->connect($connectionSettings, true);

        $payload = json_encode([
            'servo_position' => $servo,
            'lcd_text' => $lcd
        ]);

        $mqtt->publish('iot/control', $payload);
        $mqtt->disconnect();
    }
}
