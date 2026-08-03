<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('dashboard');

Route::resource('events', EventController::class)->except(['show']);

Route::post('/reservations', [ReservationController::class, 'store'])
    ->name('reservations.store');

Route::get('/reservations', [ReservationController::class, 'index'])
    ->name('reservations.index');

Route::get('/tickets', [TicketController::class, 'index'])
    ->name('tickets.index');

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->name('tickets.show');


Route::get("/login", function () {
    return view("/auth/login");
})->name("login");
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::get("/register", function () {
    return view("/auth/register");
})->name("register");
Route::post("/register", [AuthController::class, "register"])->name("register");
