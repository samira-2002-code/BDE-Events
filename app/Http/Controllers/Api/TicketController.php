<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Ticket::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return response()->json([
            'message' => 'Not available'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            Ticket::with('reservation.user', 'reservation.event')
                ->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return response()->json([
            'message' => 'Not available'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->delete();

        return response()->json([
            'message' => 'Ticket deleted successfully'
        ]);
    }
}







