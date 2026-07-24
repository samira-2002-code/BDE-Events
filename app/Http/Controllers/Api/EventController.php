<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Controllers\Controller;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::withCount('reservations')->get();

        foreach ($events as $event) {
            $event->remaining_places = $event->capacity - $event->reservations_count;
        }

        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'created_by' => 1,
        ]);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Event::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest  $request, string $id)
    {
        $event = Event::findOrFail($id);

        $event->update($request->validated());

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully'
        ]);
    }
}
