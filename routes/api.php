<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API works!'
    ]);
});

Route::apiResource('events', EventController::class);