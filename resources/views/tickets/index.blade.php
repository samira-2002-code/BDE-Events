@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8">
        🎫 Mes Billets
    </h1>

    @if($tickets->isEmpty())
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg">
        Vous n'avez encore aucun billet.
    </div>
    @else

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($tickets as $ticket)

        <div class="bg-white shadow rounded-xl p-6">

            <h2 class="text-xl font-bold">
                {{ $ticket->reservation->event->title }}
            </h2>

            <p class="mt-3">
                📅 {{ $ticket->reservation->event->date }}
            </p>

            <p>
                🕒 {{ $ticket->reservation->event->time }}
            </p>

            <p>
                📍 {{ $ticket->reservation->event->location }}
            </p>

            <p class="mt-3 font-semibold text-blue-600">
                Code :
                {{ $ticket->reservation->reservation_code }}
            </p>

            <a href="{{ route('tickets.show', $ticket->id) }}"
                class="text-blue-600">
                Voir le ticket
            </a>

        </div>

        @endforeach

    </div>

    @endif

</div>
@endsection