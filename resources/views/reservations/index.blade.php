@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold mb-8 flex items-center gap-2">
        <i data-lucide="calendar-check"></i>
        Mes réservations
    </h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-700 text-white">

                <tr>
                    <th class="p-4">Événement</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Code</th>
                    <th>Ticket</th>
                </tr>

            </thead>

            <tbody>

            @forelse($reservations as $reservation)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $reservation->event->title }}
                    </td>

                    <td class="text-center">
                        {{ $reservation->event->date }}
                    </td>

                    <td class="text-center">
                        {{ $reservation->event->location }}
                    </td>

                    <td class="text-center font-semibold">
                        {{ $reservation->reservation_code }}
                    </td>

                    <td class="text-center">

                        <a href="{{ route('tickets.show',$reservation->ticket->id) }}"
                           class="text-blue-700 hover:underline">

                            Voir Ticket

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-8 text-gray-500">

                        Aucune réservation.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection