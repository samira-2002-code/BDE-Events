<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['event', 'ticket'])->latest()->get();

        return view('reservations.index', compact('reservations'));
    }

    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);

        if ($event->reservations()->count() >= $event->capacity) {
            return redirect()->back()->with('error', 'Événement complet.');
        }

        $reservation = Reservation::create([
            'user_id' => 1,
            'event_id' => $event->id,
            'reservation_code' => 'BDE-' . Str::upper(Str::random(8)),
        ]);

        Ticket::create([
            'reservation_id' => $reservation->id,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Réservation effectuée avec succès.');
    }
}