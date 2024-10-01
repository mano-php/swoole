<?php

use ManoCode\Swoole\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('swoole', [Controllers\SwooleApplicationController::class, 'in']);
