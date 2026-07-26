@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
    {{ session('success') }}
</div>
@endif

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-4xl font-bold text-gray-800 flex items-center gap-2">
            <i data-lucide="layout-dashboard"></i>
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-2">
            Gérez les événements du BDE.
        </p>
    </div>

    <a href="{{ route('events.create') }}"
        class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-3 rounded-xl flex items-center gap-2">

        <i data-lucide="plus-circle"></i>

        Ajouter un événement

    </a>

</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <table class="w-full">

        <thead class="bg-blue-700 text-white">

            <tr>

                <th class="p-4 text-left">Titre</th>
                <th class="p-4">Date</th>
                <th class="p-4">Lieu</th>
                <th class="p-4">Places restantes</th>
                <th class="p-4">Réservations</th>
                <th class="p-4">Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($events as $event)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-4 font-semibold">
                    {{ $event->title }}
                </td>

                <td class="text-center">
                    {{ $event->date }}
                </td>

                <td class="text-center">
                    {{ $event->location }}
                </td>

                <td class="text-center">
                    {{ $event->remaining_places }}
                </td>

                <td class="text-center">
                    {{ $event->reservations_count }}
                </td>

                <td>

                    <div class="flex justify-center items-center gap-4">

                        <a href="/events/{{ $event->id }}/edit"
                            class="bg-yellow-500 text-white px-3 py-2 rounded">
                            Modifier
                        </a>

                        <form action="{{ route('events.destroy', $event->id) }}"
                            method="POST"
                            onsubmit="return confirm('Supprimer cet événement ?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="text-red-500 hover:text-red-600">

                                <i data-lucide="trash-2"></i>

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                    class="text-center p-8 text-gray-500">

                    Aucun événement trouvé.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection