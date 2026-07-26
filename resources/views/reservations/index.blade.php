@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="mb-10">

        <h1 class="text-4xl font-bold text-[#2d2a26] flex items-center gap-3">

            <div class="bg-[#b68d2c] p-3 rounded-full">

                <i data-lucide="calendar-check" class="text-white"></i>

            </div>

            Mes réservations

        </h1>

        <p class="text-gray-500 mt-3">

            Retrouvez toutes vos réservations et accédez rapidement à vos billets.

        </p>

    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-300 bg-green-50 px-5 py-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-2xl border border-red-300 bg-red-50 px-5 py-4 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl bg-white shadow-xl border border-gray-200">

        <table class="w-full">

            <thead class="bg-[#2d2a26] text-white">

                <tr>

                    <th class="p-5 text-left">Événement</th>
                    <th class="p-5">Date</th>
                    <th class="p-5">Lieu</th>
                    <th class="p-5">Code</th>
                    <th class="p-5">Ticket</th>

                </tr>

            </thead>

            <tbody>

                @forelse($reservations as $reservation)

                <tr class="border-b hover:bg-[#faf8f5] duration-200">

                    <td class="p-5 font-semibold text-[#2d2a26]">

                        {{ $reservation->event->title }}

                    </td>

                    <td class="text-center">

                        {{ $reservation->event->date }}

                    </td>

                    <td class="text-center">

                        {{ $reservation->event->location }}

                    </td>

                    <td class="text-center">

                        <span class="bg-[#f5f1eb] text-[#b68d2c] font-bold px-4 py-2 rounded-full">

                            {{ $reservation->reservation_code }}

                        </span>

                    </td>

                    <td class="text-center">

                        <a href="{{ route('tickets.show', $reservation->ticket->id) }}"
                           class="inline-flex items-center gap-2 bg-[#2d2a26] hover:bg-black text-white px-5 py-2 rounded-xl transition">

                            <i data-lucide="ticket"></i>

                            Voir Ticket

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="py-12 text-center text-gray-500">

                        <div class="flex flex-col items-center gap-3">

                            <i data-lucide="calendar-x" class="w-12 h-12 text-gray-400"></i>

                            <p class="text-lg">

                                Aucune réservation disponible.

                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection