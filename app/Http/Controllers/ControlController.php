<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlLog;
use App\Services\MQTTService;

class ControlController extends Controller
{
    //


    public function control(Request $request)
    {
        $servo = $request->input('servo_position');
        $lcd = $request->input('lcd_text');

        MQTTService::publish($servo, $lcd);

        ControlLog::create([
            'servo_position' => $servo,
            'lcd_text' => $lcd
        ]);

        return redirect()->back()->with('success', 'Perintah dikirim!');
    }
}
