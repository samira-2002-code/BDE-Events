<?php

namespace App\Http\Controllers;

use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::withCount('reservations')->latest()->get();

        foreach ($events as $event) {
            $event->remaining_places =
                $event->capacity - $event->reservations_count;
        }

        return view('admin.dashboard', compact('events'));
    }
}