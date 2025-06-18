<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'servo_position',
        'lcd_text',
    ];
}
