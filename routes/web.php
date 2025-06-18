<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ControlController;

Route::get('/', [DashboardController::class, 'index']);
Route::post('/control', [ControlController::class, 'control']);
