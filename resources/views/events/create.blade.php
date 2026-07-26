@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">

    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
        <i data-lucide="calendar-plus"></i>
        Ajouter un événement
    </h2>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="font-semibold">Titre</label>
                <input type="text" name="title"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('title') }}">
            </div>

            <div>
                <label class="font-semibold">Lieu</label>
                <input type="text" name="location"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('location') }}">
            </div>

            <div class="col-span-2">
                <label class="font-semibold">Description</label>
                <textarea name="description"
                    class="w-full border rounded-lg p-3 mt-2"
                    rows="4">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="font-semibold">Date</label>
                <input type="date" name="date"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('date') }}">
            </div>

            <div>
                <label class="font-semibold">Heure</label>
                <input type="time" name="time"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('time') }}">
            </div>

            <div>
                <label class="font-semibold">Prix (DH)</label>
                <input type="number" step="0.01" name="price"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('price') }}">
            </div>

            <div>
                <label class="font-semibold">Capacité</label>
                <input type="number" name="capacity"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('capacity') }}">
            </div>

        </div>

        <div class="flex justify-end gap-4 mt-8">

            <a href="{{ route('dashboard') }}"
                class="px-5 py-3 rounded-lg bg-gray-300 hover:bg-gray-400">
                Annuler
            </a>

            <button
                class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-lg flex items-center gap-2">

                <i data-lucide="save"></i>

                Enregistrer

            </button>

        </div>

    </form>

</div>

@endsection