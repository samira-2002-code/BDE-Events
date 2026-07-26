@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl p-8">

        <div class="text-center mb-8">

            <i data-lucide="ticket" class="w-16 h-16 text-blue-700 mx-auto"></i>

            <h1 class="text-3xl font-bold mt-4">

                Ticket de réservation

            </h1>

        </div>

        <div class="space-y-4">

            <div class="flex justify-between border-b pb-2">

                <span class="font-semibold">Événement</span>

                <span>{{ $ticket->reservation->event->title }}</span>

            </div>

            <div class="flex justify-between border-b pb-2">

                <span class="font-semibold">Date</span>

                <span>{{ $ticket->reservation->event->date }}</span>

            </div>

            <div class="flex justify-between border-b pb-2">

                <span class="font-semibold">Heure</span>

                <span>{{ $ticket->reservation->event->time }}</span>

            </div>

            <div class="flex justify-between border-b pb-2">

                <span class="font-semibold">Lieu</span>

                <span>{{ $ticket->reservation->event->location }}</span>

            </div>

            <div class="flex justify-between border-b pb-2">

                <span class="font-semibold">Code</span>

                <span class="font-bold text-blue-700">

                    {{ $ticket->reservation->reservation_code }}

                </span>

            </div>

        </div>

        <div class="mt-8">

            <a href="{{ route('reservations.index') }}"
               class="w-full flex justify-center bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-xl">

                Retour aux réservations

            </a>

        </div>

    </div>

</div>

@endsection







