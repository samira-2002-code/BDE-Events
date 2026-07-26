<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['reservation.event', 'reservation.user'])
            ->whereHas('reservation', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('tickets.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::with(['reservation.event', 'reservation.user'])
            ->findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }
}