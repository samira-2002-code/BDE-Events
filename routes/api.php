<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\TicketController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API works!'
    ]);
});

Route::apiResource('events', EventController::class);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('tickets', TicketController::class);