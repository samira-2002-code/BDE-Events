<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('reservations')->get();

        foreach ($events as $event) {
            $event->remaining_places =
                $event->capacity - $event->reservations_count;
        }

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request)
    {
        Event::create([
            ...$request->validated(),
            'created_by' => 1,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Événement ajouté avec succès.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update($request->validated());

        return redirect()->route('dashboard')
            ->with('success', 'Événement modifié avec succès.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Événement supprimé avec succès.');
    }
}