<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MQTTService;

class MqttSubscribe extends Command
{
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT and save data to DB';

    public function handle()
    {
        MQTTService::subscribe();
    }
}
