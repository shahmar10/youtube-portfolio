<?php

use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/sendMessage',     [MessageController::class, 'send']);
