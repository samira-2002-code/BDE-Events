@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="mb-8 rounded-2xl border border-emerald-200 bg-emerald-50 px-6 py-4 text-emerald-700 shadow-sm">
    {{ session('success') }}
</div>
@endif

<div class="flex flex-col md:flex-row justify-between md:items-center gap-6 mb-10">

    <div>
        <span class="text-sm uppercase tracking-[0.3em] text-gray-400">
            Administration
        </span>

        <h1 class="mt-2 text-5xl font-black text-gray-800 flex items-center gap-3">
            <i data-lucide="layout-dashboard" class="w-9 h-9 text-[#3D5A40]"></i>
            Dashboard
        </h1>

        <p class="mt-3 text-gray-500">
            Gérez facilement tous les événements du campus.
        </p>
    </div>

    <a href="{{ route('events.create') }}"
        class="bg-[#3D5A40] hover:bg-[#314A35] text-white px-6 py-4 rounded-2xl shadow-lg transition flex items-center gap-3">

        <i data-lucide="plus"></i>

        Ajouter un événement

    </a>

</div>

<div class="grid md:grid-cols-3 gap-6 mb-10">

    <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-100">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-400 text-sm">
                    Événements
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $events->count() }}
                </h2>

            </div>

            <div class="bg-[#F5F3EC] p-4 rounded-2xl">

                <i data-lucide="calendar-days" class="text-[#3D5A40]"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-100">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-400 text-sm">
                    Réservations
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $events->sum('reservations_count') }}
                </h2>

            </div>

            <div class="bg-[#F5F3EC] p-4 rounded-2xl">

                <i data-lucide="users" class="text-[#3D5A40]"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-100">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-400 text-sm">
                    Places disponibles
                </p>

                <h2 class="text-4xl font-bold text-gray-800 mt-2">
                    {{ $events->sum('remaining_places') }}
                </h2>

            </div>

            <div class="bg-[#F5F3EC] p-4 rounded-2xl">

                <i data-lucide="badge-check" class="text-[#3D5A40]"></i>

            </div>

        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] shadow-lg overflow-hidden border border-gray-100">

    <table class="w-full">

        <thead class="bg-[#1F1F1F] text-white">

            <tr>

                <th class="p-5 text-left font-medium">Événement</th>
                <th class="p-5">Date</th>
                <th class="p-5">Lieu</th>
                <th class="p-5">Places</th>
                <th class="p-5">Réservations</th>
                <th class="p-5">Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($events as $event)

            <tr class="border-b last:border-none hover:bg-[#F8F7F4] transition">

                <td class="p-5">

                    <div class="font-bold text-gray-800">
                        {{ $event->title }}
                    </div>

                </td>

                <td class="text-center text-gray-600">
                    {{ $event->date }}
                </td>

                <td class="text-center text-gray-600">
                    {{ $event->location }}
                </td>

                <td class="text-center">

                    <span class="bg-[#EEF6EF] text-[#3D5A40] px-4 py-2 rounded-full text-sm font-semibold">

                        {{ $event->remaining_places }}

                    </span>

                </td>

                <td class="text-center font-semibold text-gray-700">

                    {{ $event->reservations_count }}

                </td>

                <td>

                    <div class="flex justify-center gap-3">

                        <a href="/events/{{ $event->id }}/edit"
                            class="bg-[#C9A227] hover:bg-[#B8931E] text-white px-4 py-2 rounded-xl transition">

                            <i data-lucide="pencil" class="w-4 h-4"></i>

                        </a>

                        <form action="{{ route('events.destroy', $event->id) }}"
                            method="POST"
                            onsubmit="return confirm('Supprimer cet événement ?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-[#B23A48] hover:bg-[#992D3A] text-white px-4 py-2 rounded-xl transition">

                                <i data-lucide="trash-2" class="w-4 h-4"></i>

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="py-16 text-center text-gray-400">

                    <i data-lucide="calendar-x" class="w-10 h-10 mx-auto mb-4"></i>

                    Aucun événement disponible.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection