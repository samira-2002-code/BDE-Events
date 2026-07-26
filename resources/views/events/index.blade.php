@extends('layouts.app')

@section('content')

<div class="mb-12 text-center">

    <h1 class="text-5xl font-bold text-[#2d2a26]">

        Découvrez nos événements

    </h1>

    <p class="mt-4 text-gray-600 text-lg">

        Réservez votre place et participez aux activités du BDE.

    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

@foreach($events as $event)

<div class="bg-white rounded-3xl border border-gray-200 shadow-lg hover:shadow-2xl duration-300 overflow-hidden">

    <div class="h-2 bg-[#b68d2c]"></div>

    <div class="p-7">

        <div class="flex justify-between items-start">

            <h2 class="text-2xl font-bold text-[#2d2a26]">

                {{ $event->title }}

            </h2>

            <div class="bg-[#f5f1eb] rounded-full p-3">

                <i data-lucide="calendar-heart"
                    class="w-5 h-5 text-[#b68d2c]"></i>

            </div>

        </div>

        <p class="text-gray-500 mt-4 leading-relaxed">

            {{ $event->description }}

        </p>

        <div class="mt-7 space-y-4">

            <div class="flex items-center gap-3">

                <div class="bg-[#f5f1eb] p-2 rounded-full">

                    <i data-lucide="calendar"
                        class="w-4 h-4 text-[#b68d2c]"></i>

                </div>

                <span>{{ $event->date }}</span>

            </div>

            <div class="flex items-center gap-3">

                <div class="bg-[#f5f1eb] p-2 rounded-full">

                    <i data-lucide="clock-3"
                        class="w-4 h-4 text-[#b68d2c]"></i>

                </div>

                <span>{{ $event->time }}</span>

            </div>

            <div class="flex items-center gap-3">

                <div class="bg-[#f5f1eb] p-2 rounded-full">

                    <i data-lucide="map-pin"
                        class="w-4 h-4 text-[#b68d2c]"></i>

                </div>

                <span>{{ $event->location }}</span>

            </div>

            <div class="flex items-center justify-between">

                <span class="text-gray-600">

                    Prix

                </span>

                <span class="font-bold text-[#2d2a26]">

                    {{ $event->price }} DH

                </span>

            </div>

            <div class="flex items-center justify-between">

                <span class="text-gray-600">

                    Places restantes

                </span>

                <span class="font-bold text-[#b68d2c]">

                    {{ $event->remaining_places }}

                </span>

            </div>

        </div>

        <form action="{{ route('reservations.store') }}" method="POST">

            @csrf

            <input
                type="hidden"
                name="event_id"
                value="{{ $event->id }}">

            <button
                type="submit"
                class="mt-8 w-full bg-[#2d2a26] hover:bg-black duration-300 text-white py-4 rounded-2xl font-semibold flex justify-center items-center gap-3">

                <i data-lucide="ticket"></i>

                Réserver maintenant

            </button>

        </form>

    </div>

</div>

@endforeach

</div>

@endsection