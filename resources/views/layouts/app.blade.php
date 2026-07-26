<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDE Events</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <nav class="bg-blue-700 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

            <h1 class="flex items-center gap-2 text-white text-2xl font-bold">

                <i data-lucide="calendar-days"></i>

                BDE Events

            </h1>

            <div class="flex gap-8 text-white">

                <a href="{{ route('home') }}" class="hover:text-blue-200 flex items-center gap-2">
                    <i data-lucide="house" class="w-5 h-5"></i>
                    Accueil
                </a>

                <a href="{{ route('dashboard') }}" class="hover:text-blue-200 flex items-center gap-2">
                    <i data-lucide="layout-dashboard"></i>
                    Dashboard
                </a>

                <a href="{{ route('reservations.index') }}" class="hover:text-blue-200 flex items-center gap-2">
                    <i data-lucide="calendar-check" class="w-5 h-5"></i>
                    Réservations
                </a>

                <a href="{{ route('tickets.index') }}" class="hover:text-blue-200 flex items-center gap-2">
                    <i data-lucide="ticket" class="w-5 h-5"></i>
                    Tickets
                </a>

            </div>

        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10">

        @yield('content')

    </div>

    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>