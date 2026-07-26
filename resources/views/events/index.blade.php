@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-10">

    <div>

        <h2 class="text-4xl font-bold text-gray-800">

            Tous les événements

        </h2>

        <p class="text-gray-500 mt-2">

            Découvrez les prochains événements organisés par le BDE.

        </p>

    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    @foreach($events as $event)

    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">

        <div class="bg-blue-700 h-3"></div>

        <div class="p-6">

            <h3 class="text-2xl font-bold text-gray-800">

                {{ $event->title }}

            </h3>

            <p class="text-gray-500 mt-3">

                {{ $event->description }}

            </p>

            <div class="mt-6 space-y-3 text-gray-700">

                <div class="flex items-center gap-3">

                    <i data-lucide="calendar" class="text-blue-600 w-5 h-5"></i>

                    {{ $event->date }}

                </div>

                <div class="flex items-center gap-3">

                    <i data-lucide="clock-3" class="text-blue-600 w-5 h-5"></i>

                    {{ $event->time }}

                </div>

                <div class="flex items-center gap-3">

                    <i data-lucide="map-pin" class="text-red-500 w-5 h-5"></i>

                    {{ $event->location }}

                </div>

                <div class="flex items-center gap-3">

                    <i data-lucide="wallet" class="text-green-600 w-5 h-5"></i>

                    {{ $event->price }} DH

                </div>

                <div class="flex items-center gap-3 font-semibold text-indigo-700">

                    <i data-lucide="users" class="w-5 h-5"></i>

                    {{ $event->remaining_places }} places restantes

                </div>

            </div>

            <button
                class="mt-8 w-full bg-blue-700 hover:bg-blue-800 transition text-white py-3 rounded-xl flex justify-center items-center gap-2">

                <i data-lucide="ticket"></i>

                Réserver

            </button>

        </div>

    </div>

    @endforeach

</div>

@endsection