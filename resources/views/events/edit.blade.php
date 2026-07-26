@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">

    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
        <i data-lucide="pencil"></i>
        Modifier un événement
    </h2>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label>Titre</label>
                <input type="text" name="title"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('title', $event->title) }}">
            </div>

            <div>
                <label>Lieu</label>
                <input type="text" name="location"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('location', $event->location) }}">
            </div>

            <div class="col-span-2">
                <label>Description</label>
                <textarea name="description"
                    class="w-full border rounded-lg p-3 mt-2"
                    rows="4">{{ old('description', $event->description) }}</textarea>
            </div>

            <div>
                <label>Date</label>
                <input type="date" name="date"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('date', $event->date) }}">
            </div>

            <div>
                <label>Heure</label>
                <input type="time" name="time"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('time', $event->time) }}">
            </div>

            <div>
                <label>Prix</label>
                <input type="number" step="0.01" name="price"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('price', $event->price) }}">
            </div>

            <div>
                <label>Capacité</label>
                <input type="number" name="capacity"
                    class="w-full border rounded-lg p-3 mt-2"
                    value="{{ old('capacity', $event->capacity) }}">
            </div>

        </div>


        <div class="flex justify-end gap-4 mt-8">

            <a href="{{ route('dashboard') }}"
                class="px-5 py-3 rounded-lg bg-gray-300 hover:bg-gray-400">
                Annuler
            </a>

            <button
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg flex items-center gap-2">

                <i data-lucide="save"></i>

                Modifier

            </button>

        </div>

    </form>
    <p class="text-red-600 font-bold">
        Action: {{ route('events.update', $event->id) }}
    </p>

</div>

@endsection



