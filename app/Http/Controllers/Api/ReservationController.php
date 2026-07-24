<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Support\Str;
use App\Models\Ticket;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Reservation::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $event = Event::findOrFail($request->event_id);

        if ($event->reservations()->count() >= $event->capacity) {
            return response()->json([
                'message' => 'Event is full'
            ], 400);
        }

        $exists = Reservation::where('user_id', 1)
            ->where('event_id', $request->event_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'You have already reserved this event'
            ], 400);
        }

        $reservation = Reservation::create([
            'user_id' => 1,
            'event_id' => $request->event_id,
            'reservation_code' => 'BDE-' . Str::upper(Str::random(8)),
        ]);

        Ticket::create([
            'reservation_id' => $reservation->id,
        ]);

        return response()->json($reservation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Reservation::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReservationRequest $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update($request->validated());

        return response()->json($reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return response()->json([
            'message' => 'Reservation deleted successfully'
        ]);
    }
}
